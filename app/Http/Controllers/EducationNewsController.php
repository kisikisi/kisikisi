<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\EducationNews;
use App\NewsCategory;
use App\Label;
use Auth;

class EducationNewsController extends Controller
{
   public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail']]);
	}

	public function index(EducationNews $news){
    	$data['news'] = $news->newsList()->get();
    	return response()->json($data);
    }

    public function form() {
        $data['newsCategories'] = NewsCategory::all();
        $data['labels'] = Label::all();
    	return response()->json($data);
    }
    
    public function uploadCover() {
        $logo = Input::file('image');
    	
    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/news/cover/';
            $filename = time() . '.' . $logo->getClientOriginalExtension();
	        if(!$logo->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'cover' => $filename], 200);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }
    
    public function uploadContent() {
        $icon = Input::file('image');
    	
    	//var_dump($icon);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/news/content/';
            $filename = time() . '.' . $icon->getClientOriginalExtension();
	        if(!$icon->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'content' => $filename ], 200);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }
    
    public function add(Request $request, EducationNews $news){
    	$input = $request->all();
        $input['author'] = Auth::user()->id;
        $input['date'] = strtotime($input['date']);
    	$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = EducationNews::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'education news added';
    		$data['news'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'education news  failed to add';
    	}
        return response()->json($data);
    }

    public function detail($id){
        $data['detail'] = EducationNews::with(["newsCategory","author","newsLabel" => function($query) {
            $query->label;
        }])->find($id);
            
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
