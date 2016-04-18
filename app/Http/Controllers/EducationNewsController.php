<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\EducationNews;

use Auth;

class EducationNewsController extends Controller
{
   public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail']]);
	}

	public function index(EducationNews $education){
    	$data['education'] = EducationNews::all();
    	return json_encode($data);
    }

     public function add(Request $request, EducationNews $news){
    	$input = $request->all();
    	$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = EducationNews::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'education news added';
    		$data['category'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'education news  failed to add';
    	}
    }

    public function detail($id){
        $data['detail'] = EducationNews::with(["title","content","image_content","image_cover","date"])
            ->where('id', $id)
            ->get();

        return response()->json($data);
    }

    public function update(Request $request, EducationNews $news,$id){
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$type = EducationNews::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id){
    	$delete = EducationNews::where('id', $id)->delete();

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
