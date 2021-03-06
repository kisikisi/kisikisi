<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\SchoolType;
use Auth;

class SchoolTypeController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index','scroll','detail']]);
    }

    public function index() {
    	$data['type'] =  SchoolType::all();
        
        return response()->json($data);
    }

	public function scroll($after, $limit, SchoolType $type, Request $request) {

    	$lists = $type->orderBy('id', 'desc')
				 ->take($limit);

		if ($after != 0) $lists->where('id','<', $after);
        $data['types'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function detail($id) {
        $data['schoolType'] = SchoolType::find($id);
        return response()->json($data);        
    }    
    
    public function add(Request $request) {
    	$input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;
        
		$save = SchoolType::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'type added';
    		$data['type'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'type failed to add';
    	}
	
    	return response()->json($data);
    }

    public function update(Request $request, $id) {
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

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

    	return response()->json($data);
    }
}
