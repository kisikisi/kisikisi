<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\NewsCategory;
use Auth;

class NewsCategoryController extends Controller
{
	public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','scroll']]);
	}

    public function index(NewsCategory $news){
    	$data['categories'] = NewsCategory::all();
    	return response()->json($data);
    }

	public function scroll($after, $limit, NewsCategory $category, Request $request) {

    	$lists = $category->orderBy('id', 'desc')
			->take($limit);

		if ($after != 0) $lists->where('id','<', $after);
        $data['categories'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function add(Request $request, NewsCategory $news){
    	$input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = NewsCategory::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'news category added';
    		$data['category'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'news category failed to add';
    	}
    	return response()->json($data);
    }

    public function update(Request $request, NewsCategory $news,$id){
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$type = NewsCategory::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id){
    	$delete = NewsCategory::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'Category deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'Category failed to delete';
    	}

    	return response()->json($data);
    }
}
