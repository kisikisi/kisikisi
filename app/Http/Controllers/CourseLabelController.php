<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Label;

class CourseLabelController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}

    public function index() {

    }

    public function add($course_id, $label_id) {
        $input['course_id'] = $course_id;
        $input['label_id'] = $label_id;

        $save = CourseLabel::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'course label added';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'course label failed to add';
    	}
    	return response()->json($data);
    }

    public function remove($course_id, $label_id) {
        $delete = CourseLabel::where('course_id', $course_id)->where('label_id', $label_id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'label deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'label failed to delete';
    	}

    	return response()->json($data);
    }
}
