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
use App\Http\Controllers\Auth\AuthController;
//use Entrust;

class EducationAgendaController extends Controller {
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail','scroll','form','calendar']]);
	}

	public function index(EducationAgenda $agenda){
    	$data['agenda'] = $agenda->agendaList()->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

	public function calendar(EducationAgenda $agenda) {
		$data['calendar'] = $agenda->select(['title','start_datetime as start','end_datetime as end'])
			->where('status',1)->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
	}

	public function scroll($after, $limit, EducationAgenda $agenda, Request $request, AuthController $auth) {
		$agenda_category_id = $request->input('agenda_category_id');
		$city_id = $request->input('city_id');
		$title = $request->input('title');

    	$lists = $agenda->agendaList()
			->orderBy($agenda->table.'.id', 'desc')
			->take($limit);
		if (!$user = $auth->getAuthUser())  $lists->where('status', 1);
		else if (!$user->hasRole(['admin','manager'])) $lists->where('status', 1);

		if (!empty($agenda_category_id)) $lists->where('agenda_category_id', $agenda_category_id);
        if (!empty($city_id)) $lists->where('city_id', $city_id);
        if (!empty($title)) $lists->where($agenda->table.'.title', 'like', "%$title%");

		if ($after != 0) $lists->where($agenda->table.'.id','<', $after);
        $data['agendas'] = $lists->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
		//print_r(Auth::user()->name);

    }

    public function form() {
        $data['agendaCategories'] = AgendaCategory::all();
        $data['provinces'] = Province::select(['id','name'])->get();
        $data['cities'] = City::select(['id','province_id','name'])->get();
        $data['labels'] = Label::all();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
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
	        $destinationPath = base_path() . '/storage/files/agenda/content/';
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
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function detail($id) {
		$agenda = explode('-', $id, 2);

		$data['detail'] = EducationAgenda::with(["agendaCategory","city.province","city"])->find($agenda[0]);
		$data['agendaLabel'] = EducationAgenda::find($agenda[0])->agendaLabel()->get();
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, EducationAgenda $agenda,$id){
    	$input = $request->all();
        $input['start_datetime'] = strtotime($input['start_datetime']);
        $input['end_datetime'] = strtotime($input['end_datetime']);
    	$input['modified_by'] = Auth::user()->id;

    	$type = EducationAgenda::where('id', $id)->first();
    	if ($type->update($input)) {
            $data = $agenda->agendaList()->where($agenda->table.'.id', $id)->get();
            return response()->json(['status' => 'success', 'message' => 'agenda data updated', 'agenda' => $data], 200);
        } else return response()->json(['status' => 'error', 'message' => 'fail to update data'], 500);
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

		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
