<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\SchoolDirectory;
use App\Province;
use App\City;
use App\SchoolType;
use Auth;
use Entrust;
use App\Http\Controllers\Auth\AuthController;

class SchoolDirectoryController extends Controller
{
     public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index','form','detail','paging','scroll','search']]);
    }

    public function index(SchoolDirectory $school) {
    	$data['schools'] =  $school->schoolList()->get();

        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

	public function search(SchoolDirectory $school, Request $request) {
		$school_type_id = $request->input('school_type_id');
		$city_id = $request->input('city_id');
		$name = $request->input('name');

		$search =  $school->schoolList();
		if (! Entrust::hasRole(['admin','manager'])) $lists->where('status', 1);
		if (!empty($school_type_id)) $search->where('school_type_id', $school_type_id);
        if (!empty($city_id)) $search->where('city_id', $city_id);
        if (!empty($name)) $search->where($school->table.'.name', 'like', "%$name%");
		$data['schools'] = $search->get();

        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
	}

    public function paging($page, $limit, SchoolDirectory $school) {
    	$offset = ($page-1) * $limit;

		$data['count'] = $school->count();
        $data['schools'] =  $school->schoolList()
            ->orderBy('id','desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function scroll($after, $limit, SchoolDirectory $school, Request $request, AuthController $auth) {
		$school_type_id = $request->input('school_type_id');
		$city_id = $request->input('city_id');
		$name = $request->input('name');

    	$lists = $school->schoolList()
			->orderBy($school->table.'.id', 'desc')
			->take($limit);

		if (!$user = $auth->getAuthUser())  $lists->where('status', 1);
		else if (!$user->hasRole(['admin','manager'])) $lists->where('status', 1);

		if (!empty($school_type_id)) $lists->where('school_type_id', $school_type_id);
        if (!empty($city_id)) $lists->where('city_id', $city_id);
        if (!empty($name)) $lists->where($school->table.'.name', 'like', "%$name%");

		if ($after != 0) $lists->where($school->table.'.id','<', $after);
        $data['schools'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function detail($id) {
        $data['detail'] = SchoolDirectory::with(["schoolType","city.province","city","createdBy","modifiedBy"])
            ->where('id', $id)
            ->get();

        return response()->json($data);
    }
    
    public function form() {
        $data['schoolTypes'] = SchoolType::orderBy('group','asc')
			->orderBy('id','asc')
			->get();
        $data['provinces'] = Province::select(['id','name'])->get();
        $data['cities'] = City::select(['id','province_id','name'])->get();
        
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function uploadLogo() {
        $logo = Input::file('image');
    	
    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/school/logo/';
            $filename = time() . '.' . $logo->getClientOriginalExtension();
	        if(!$logo->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'logo' => $filename], 200);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }
    
    public function uploadImage() {
        $icon = Input::file('image');
    	
    	//var_dump($icon);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/school/image/';
            $filename = time() . '.' . $icon->getClientOriginalExtension();
	        if(!$icon->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'image' => $filename ], 200, [], JSON_NUMERIC_CHECK);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }
    
    public function add(Request $request, SchoolDirectory $school) {

        $input = $request->all();
		$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = SchoolDirectory::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'school added';
    		$data['school'] = $school->schoolList()->where($school->table.'.id', $save->id)->get();
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'school failed to add';
    	}
	
    	return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, SchoolDirectory $school, $id) {
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$update = SchoolDirectory::where('id', $id)->first();
    	if ($update->update($input)) {
            $data = $school->schoolList()->where($school->table.'.id', $id)->get();
            return response()->json(['status' => 'success',  'message' => 'school data updated', 'school' => $data], 200, [], JSON_NUMERIC_CHECK);
        } else return response()->json(['status' => 'error', 'message' => 'fail to update data'], 500);
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

    	return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
