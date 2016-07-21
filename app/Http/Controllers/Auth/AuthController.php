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
				$data = ['user'=>$user];
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
        $inputProfile['fullname'] = $request->input('name');

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
}
