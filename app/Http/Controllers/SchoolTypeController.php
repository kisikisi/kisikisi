<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SchoolType;

class SchoolTypeController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['type'] =  SchoolType::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->(['name']);

		$save = SchoolType::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'type added';
    		$data['type'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'type failed to add';
    	}
	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('name');

    	$type = SchoolType::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = SchoolType::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'type deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'type failed to delete';
    	}

    	return json_encode($data);
    }
}
