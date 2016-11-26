<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UserProfile;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
use JWTAuth;
use Auth;
use Config;
use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

	public function getAuthUser($json = false) {
        /*try {

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }*/
		if (JWTAuth::getToken()) {
			if (! $user = JWTAuth::parseToken()->authenticate()) {
				$data = ['message'=>'user_not_found'];
				$status = 404;
			} else {
				$data = ['user'=> $user];
				$data['user']['role'] = User::find($user->id)->roles[0];
				$status = 200;
			}
			if ($json == true) return response()->json($data, $status);
			else return $user;
		} return false;
		// the token is valid and we have found the user via the sub claim
	}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login(Request $request, $role) {
        // grab credentials from the request
        $credentials = $request->only('name', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                $data['message'] = "username or password is wrong";
                $data['error'] = "invalid_credential";
                $data['status'] = "error";
                return response()->json($data, 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            $data['message'] = "could'nt create token";
            $data['error'] = "could_not_create_token";
            $data['status'] = "error";
            return response()->json($data, 500);
        }

		if ($role == 'setup') {
			$user = Auth::user();
			if (!$user->hasRole(['admin', 'manager'])) {
				$data['message'] = "user has invalid role";
                $data['error'] = "invalid_credential";
                $data['status'] = "error";
                return response()->json($data, 401);
			}
		}

        // all good so return the token
        return response()->json(compact('token'));
    }

	public function register(Request $request)
    {
        /*$input['level_id'] = '3';
        $input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['password'] = ;*/

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
		$role_id = $request->input('role_id');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $inputProfile['user_id'] = $user->id;
        $inputProfile['first_name'] = $request->input('name');

        if($inputProfile != NULL) {
            UserProfile::create($inputProfile);
			if ($role_id == '3') $user->roles()->attach('3');
			else if ($role_id == '4') $user->roles()->attach('4');
        }

        $credentials = $request->only('name', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));

    }

	/**
     * Login with Facebook.
     */
    public function facebook(Request $request)    {
        $client = new GuzzleHttp\Client();

        $params = [
            'code' => $request->input('code'),
            'client_id' => $request->input('clientId'),
            'redirect_uri' => $request->input('redirectUri'),
            'client_secret' => Config::get('app.facebook_secret')
        ];

        // Step 1. Exchange authorization code for access token.
        $accessTokenResponse = $client->request('GET', 'https://graph.facebook.com/v2.3/oauth/access_token', [
            'query' => $params
        ]);
        $accessToken = json_decode($accessTokenResponse->getBody(), true);

        // Step 2. Retrieve profile information about the current user.
        $fields = 'id,email,first_name,last_name,link,name';
        $profileResponse = $client->request('GET', 'https://graph.facebook.com/v2.3/me', [
            'query' => [
                'access_token' => $accessToken['access_token'],
                'fields' => $fields
            ]
        ]);
        $profile = json_decode($profileResponse->getBody(), true);

        $customClaims = [];
        // Step 3a. If user is already signed in then link accounts.
        if ($request->header('Authorization')) {

			//check user facebook id
            $user = UserProfile::where('facebook', '=', $profile['id'])->user;
            if ($user->first()) {
                return response()->json(['message' => 'Akun facebook tersebut sudah terdaftar'], 409);
            }

            $token = explode(' ', $request->header('Authorization'))[1];
            $payload = JWTAuth::decode($token, $customClaims);

            $user = User::find($payload['sub']);
            /*$user->userProfile()->facebook = $profile['id'];*/
            $user->email = $user->email ?: $profile['email'];
            $user->name = $user->name ?: $profile['name'];
            $user->save();

            $token = JWTAuth::fromUser($user, $customClaims);
			//$user = Auth::user();
            return response()->json(['token' => $token, 'user' => $user]);
        } else {
			// Step 3b. Create a new user account or return an existing one.
            $userProfile = UserProfile::where('facebook', '=', $profile['id']);
			$username = explode('@', $profile['email']);
            $userCount = User::where('name', $username)->count();

			//jika akun facebook ditemukan langsung login, jika tidak akan dicek apakah akun dengan nama tersebut sudah ada atau belum
            if ($u = $userProfile->first()) {
                $user = User::find($u->user_id);
                return response()->json(['token' => JWTAuth::fromUser($user, $customClaims)]);
			} else if ($userCount > 0) return response()->json(['message' => 'Akun dengan username serupa sudah terdaftar, silahkan daftar akun baru'], 409);


            // register user
			$newuser = new User;
            
            $newuser->email = $profile['email'];
            $newuser->name = $username[0];
            //$user->name = $profile['name'];
            $newuser->save(); 
            $newuser->attachRole('4');

            $uProfile = new UserProfile;
            $uProfile->user_id = $newuser->id;
            $uProfile->first_name = $profile['name'];
            $uProfile->facebook = $profile['id'];
            $uProfile->save();

            $token = JWTAuth::fromUser($newuser, $customClaims);
			//$user = Auth::user();
            return response()->json(['token' => $token, 'user' => $newuser]);
        }
    }

    /**
     * Login with Google.
     */
    public function google(Request $request)   {
        $client = new GuzzleHttp\Client();

        $params = [
            'code' => $request->input('code'),
            'client_id' => $request->input('clientId'),
            'client_secret' => Config::get('app.google_secret'),
            'redirect_uri' => $request->input('redirectUri'),
            'grant_type' => 'authorization_code',
        ];

        // Step 1. Exchange authorization code for access token.
        $accessTokenResponse = $client->request('POST', 'https://accounts.google.com/o/oauth2/token', [
            'form_params' => $params
        ]);
        $accessToken = json_decode($accessTokenResponse->getBody(), true);

        // Step 2. Retrieve profile information about the current user.
        $profileResponse = $client->request('GET', 'https://www.googleapis.com/plus/v1/people/me/openIdConnect', [
            'headers' => array('Authorization' => 'Bearer ' . $accessToken['access_token'])
        ]);
        $profile = json_decode($profileResponse->getBody(), true);

        $customClaims = ['foo' => 'bar', 'baz' => 'bob'];
        // Step 3a. If user is already signed in then link accounts.
        if ($request->header('Authorization'))  {
            $user = User::where('google', '=', $profile['sub']);

            if ($user->first()) return response()->json(['message' => 'Akun google tersebut sudah terdaftar'], 409);

            $token = explode(' ', $request->header('Authorization'))[1];
            $payload = JWTAuth::decode($token, $customClaims);

            $user = User::find($payload['sub']);
            $user->google = $profile['sub'];
            $user->name = $user->name ?: $profile['name'];
            $user->save();

			JWTAuth::fromUser($user, $customClaims);
			//$user = Auth::user();
            return response()->json(['token' => $token, 'user' => $user]);
        } else {
		// Step 3b. Create a new user account or return an existing one.
            $user = User::where('google', '=', $profile['sub']);
            $username = explode('@', $profile['email']);

            if ($user->first())  {
                return response()->json(['token' => JWTAuth::fromUser($user->first(), $customClaims)]);
            } else if ($user = User::where('name', $username)) return response()->json(['message' => 'Akun dengan username serupa sudah terdaftar, silahkan daftar akun baru'], 409);

            //return response()->json(['profile' =>$profile]);

            $user = new User;
            $user->google = $profile['sub'];
            $user->name = $username[0];
            $user->email= $profile['email'];
            $user->save();

			$user->attachRole('4');

            /*$uProfile = new UserProfile;
            $uProfile->user_id = $user->id;
            $uProfile->fullname = $profile['name'];
            $uProfile->summary = $profile['profile'];
            $uProfile->save();*/

			$token = JWTAuth::fromUser($user, $customClaims);
			//$user = Auth::user();
            return response()->json(['token' => $token, 'user' => $user]);
        }
    }
}
