<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\ScholarshipDegree;
use Auth;

class ScholarshipDegreeController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}

    public function index(ScholarshipDegree $degree){
    	$data['deegrees'] = ScholarshipDegree::all();
    	return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

	public function scroll($after, $limit, ScholarshipDegree $category, Request $request) {

    	$lists = $category->orderBy('id', 'desc')
			->take($limit);

		if ($after != 0) $lists->where('id','<', $after);
        $data['deegrees'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function add(Request $request, ScholarshipDegree $degree){
    	$input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = ScholarshipDegree::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'scholarship degree added';
    		$data['category'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'scholarship degree failed to add';
    	}
    	return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, ScholarshipDegree $scholarship,$id){
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$type = ScholarshipDegree::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200, [], JSON_NUMERIC_CHECK);
    	else return response()->json(['error' => 'cant_update_data'], 500);

    }

    public function delete($id){
    	$delete = ScholarshipDegree::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'Category deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'Category failed to delete';
    	}

		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
