<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\User;
use App\UserProfile;
use App\Role;
use Hash;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => []]);
    }

    public function index() {
    	$data['user'] =  User::all();

        return response()->json($data);
    }

	public function form() {
		$data['roles'] = Role::all();

        return response()->json($data);
	}

	public function edit($id) {
		$data['user'] = User::with('roles')->find($id);

        return response()->json($data);
	}

	public function scroll($after, $limit, User $user, Request $request) {

    	$lists = $user->orderBy('id', 'desc')
				 ->take($limit);

		if ($after != 0) $lists->where('id','<', $after);
        $data['users'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function add(Request $request, User $user) {
    	$input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['password'] = Hash::make($request->input('password'));
		$save = $user->create($input);

    	if (! $save) {
    		$data['status'] = 'error';
    		$data['message'] = 'user failed to add';
    	} else {
    		$data['status'] = 'success';
    		$data['message'] = 'user added';
			$inputProfile['user_id'] = $save->id;
			if($inputProfile != NULL) {
				UserProfile::create($inputProfile);
				$save->roles()->attach($request->input('role_id'));
			}
    		$data['user'] = $save;
    	}

    	return response()->json($data);
    }

    public function update(Request $request, $id) {
    	$input = $request->only('name','email','picture');
		if ($request->input('password') != '') $input['password'] = Hash::make($request->input('password'));

    	$user = User::find($id);
    	if ($user->update($input) == null) return response()->json(['succsess' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = User::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'user deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'user failed to delete';
    	}

    	return response()->json($data);
    }

}
