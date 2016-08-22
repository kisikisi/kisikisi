<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\AgendaCategory;
use Auth;

class AgendaCategoryController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}

    public function index(AgendaCategory $agenda){
    	$data['categories'] = AgendaCategory::all();
    	return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

	public function scroll($after, $limit, AgendaCategory $category, Request $request) {

    	$lists = $category->orderBy('id', 'desc')
			->take($limit);

		if ($after != 0) $lists->where('id','<', $after);
        $data['categories'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function add(Request $request, AgendaCategory $agenda){
    	$input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = AgendaCategory::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'agenda category added';
    		$data['category'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'agenda category failed to add';
    	}
    	return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, AgendaCategory $agenda,$id){
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$type = AgendaCategory::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200, [], JSON_NUMERIC_CHECK);
    	else return response()->json(['error' => 'cant_update_data'], 500);

    }

    public function delete($id){
    	$delete = AgendaCategory::where('id', $id)->delete();

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
