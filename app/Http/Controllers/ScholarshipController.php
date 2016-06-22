<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Scholarship;
//use App\ScholarshipDegree;
use Auth;
use Entrust;
use App\Http\Controllers\Auth\AuthController;

class ScholarshipController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail','form','scroll','calendar']]);
	}

	public function index(Scholarship $scholarship){
    	$data['scholarships'] = $scholarship->scholarshipList()->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

	public function scroll($after, $limit, Scholarship $scholarship, Request $request, AuthController $auth) {
		//$scholarship_degree_id = $request->input('scholarship_degree_id');
		$title = $request->input('title');

    	$lists = $scholarship->scholarshipList()
			->orderBy($scholarship->table.'.id', 'desc')
			->take($limit);

		if (!$user = $auth->getAuthUser())  $lists->where('status', 1);
		else if (!$user->hasRole(['admin','manager'])) $lists->where('status', 1);

		//if (!empty($scholarship_degree_id)) $lists->where('scholarship_degree_id', $scholarship_degree_id);
		if (!empty($title)) $lists->where($scholarship->table.'.title', 'like', "%$title%");

		if ($after != 0) $lists->where($scholarship->table.'.id','<', $after);
        $data['scholarships'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    /*public function form() {
        $data['scholarshipDegrees'] = ScholarshipDegree::all();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }*/

    public function uploadCover() {
        $logo = Input::file('image');

    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/scholarship/cover/';
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

    public function uploadContent() {
        $icon = Input::file('image');

    	//var_dump($icon);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/scholarship/content/';
            $filename = time() . '.' . $icon->getClientOriginalExtension();
	        if(!$icon->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'content' => $filename ], 200, [], JSON_NUMERIC_CHECK);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }

    public function add(Request $request, Scholarship $scholarship){
    	$input = $request->all();
        $input['deadline'] = strtotime($input['deadline']);
    	$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = Scholarship::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'scholarship added';
    		$data['scholarship'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'scholarship  failed to add';
    	}
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function detail($id) {
		$scholarship = explode('-', $id, 2);

		$data['detail'] = Scholarship::find($scholarship[0]);
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, Scholarship $scholarship,$id){
    	$input = $request->all();
        $input['deadline'] = strtotime($input['deadline']);
    	$input['modified_by'] = Auth::user()->id;

    	$type = Scholarship::where('id', $id)->first();
    	if ($type->update($input)) {
            $data = $scholarship->scholarshipList()->where($scholarship->table.'.id', $id)->get();
            return response()->json(['status' => 'success', 'message' => 'scholarship data updated', 'scholarship' => $data], 200);
        } else return response()->json(['status' => 'error', 'message' => 'fail to update data'], 500);
    }

    public function delete($id){
    	$delete = Scholarship::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'Scholarship deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'Scholarship failed to delete';
    	}

		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
