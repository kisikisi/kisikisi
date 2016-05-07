<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\EducationAgenda;
use App\AgendaCategory;
use App\Label;
use App\Province;
use App\City;
use Auth;

class EducationAgendaController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail']]);
	}

	public function index(EducationAgenda $agenda){
    	$data['agenda'] = $agenda->agendaList()->get();
    	return response()->json($data);
    }

    public function form() {
        $data['agendaCategories'] = AgendaCategory::all();
        $data['provinces'] = Province::select(['id','name'])->get();
        $data['cities'] = City::select(['id','province_id','name'])->get();
        $data['labels'] = Label::all();
    	return response()->json($data);
    }
    
    public function uploadCover() {
        $logo = Input::file('image');
    	
    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/agenda/cover/';
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
	        $destinationPath = base_path() . '/storage/files/agenda/content/';
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
    
    public function add(Request $request, EducationAgenda $agenda){
    	$input = $request->all();
        $input['start_datetime'] = strtotime($input['start_datetime']);
        $input['end_datetime'] = strtotime($input['end_datetime']);
    	$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = EducationAgenda::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'education agenda added';
    		$data['agenda'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'education agenda  failed to add';
    	}
        return response()->json($data);
    }

    public function detail($id){
        $data['detail'] = EducationAgenda::with(["agendaCategory","city"])->find($id);
        $data['agendaLabel'] = EducationAgenda::find($id)->agendaLabel()->get();
        return response()->json($data);
    }

    public function update(Request $request, EducationAgenda $agenda,$id){
    	$input = $request->all();
        $input['start_datetime'] = strtotime($input['start_datetime']);
        $input['end_datetime'] = strtotime($input['end_datetime']);
    	$input['modified_by'] = Auth::user()->id;

    	$type = EducationAgenda::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id){
    	$delete = EducationAgenda::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'Agenda deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'Agenda failed to delete';
    	}

    	return response()->json($data);
    }
}
