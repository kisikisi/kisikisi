<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Course;
use App\CourseLabel;
use App\Label;
use Auth;
use Entrust;
use App\Http\Controllers\Auth\AuthController;

class CourseController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail','form','scroll']]);
	}

	public function index(Course $course){
    	$data['courses'] = $course->courseList()->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

	public function scroll($after, $limit, Course $course, Request $request, AuthController $auth) {
		$title = $request->input('title');

    	$lists = $course->courseList()
			->take($limit);
		if (!$user = $auth->getAuthUser())  $lists->where('status', 1);
		else if (!$user->hasRole(['admin','manager'])) $lists->where('status', 1);

		if (!empty($title)) $lists->where($course->table.'.title', 'like', "%$title%");

		if ($after != 0) $lists->where($course->table.'.id','<', $after);
        $data['courses'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function form() {
        $data['labels'] = Label::all();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function uploadCover() {
        $logo = Input::file('image');

    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/course/cover/';
            $filename = time() . '.' . $logo->getClientOriginalExtension();
	        if(!$logo->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'cover' => $filename], 200, [], JSON_NUMERIC_CHECK);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }

    /*public function uploadContent() {
        $icon = Input::file('image');

    	//var_dump($icon);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/course/content/';
            $filename = time() . '.' . $icon->getClientOriginalExtension();
	        if(!$icon->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'content' => $filename ], 200, [], JSON_NUMERIC_CHECK);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }*/

    public function add(Request $request, Course $course){
    	$input = $request->all();
        //$input['duration'] = strtotime($input['duration']);

        $input['author_id'] = Auth::user()->id;

		$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = Course::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'course added';
    		$data['course'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'course failed to add';
    	}
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function detail($id) {
		$course = explode('-', $id, 2);

		$data['detail'] = Course::with(["author"])->find($course[0]);
		$data['courseLabel'] = Course::find($course[0])->courseLabel()->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, Course $course,$id){
    	$input = $request->all();
        //$input['duration'] = strtotime($input['duration']);
    	$input['modified_by'] = Auth::user()->id;

    	$type = Course::where('id', $id)->first();
    	if ($type->update($input)) {
            $data = $course->courseList()->where($course->table.'.id', $id)->get();
            return response()->json(['status' => 'success', 'message' => 'course data updated', 'course' => $data], 200);
        } else return response()->json(['status' => 'error', 'message' => 'fail to update data'], 500);
    }

    public function delete($id){
    	$delete = Course::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'Course deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'Course failed to delete';
    	}

		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
