<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\SchoolDirectory;
use Auth;

class SchoolDirectoryController extends Controller
{
     public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index','detail']]);
    }

    public function index(SchoolDirectory $school) {
    	$data['school'] =  $school->schoolList()->get();

        return response()->json($data);
    }

    public function detail($id) {
        $data['detail'] = SchoolDirectory::with(["schoolType","city","createdBy","modifiedBy"])
            ->where('id', $id)
            ->get();

        return response()->json($data);
    }

    public function add(Request $request, SchoolDirectory $school) {

        $input = $request->all();
		$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = SchoolDirectory::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'school added';
    		$data['school'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'school failed to add';
    	}
	
    	return response()->json($data);
    }

    public function update(Request $request, SchoolDirectory $school, $id) {
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$type = SchoolDirectory::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = SchoolDirectory::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'school deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'School failed to delete';
    	}

    	return response()->json($data);
    }
}
