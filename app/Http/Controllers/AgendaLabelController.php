<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AgendaLabel;

class AgendaLabelController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}
    
    public function index() {
        
    }
    
    public function add($agenda_id, $label_id) {
        $input['agenda_id'] = $agenda_id;
        $input['label_id'] = $label_id;
        
        $save = AgendaLabel::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'agenda label added';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'agenda label failed to add';
    	}
    	return response()->json($data);
    }
    
    public function remove($agenda_id, $label_id) {
        $delete = AgendaLabel::where('agenda_id', $agenda_id)->where('label_id', $label_id)->delete();

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
