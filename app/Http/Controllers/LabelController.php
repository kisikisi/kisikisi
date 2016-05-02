<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Label;
use Auth;

class LabelController extends Controller
{
	public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}

    public function index(Label $news){
    	$data['labels'] = Label::all();
        return response()->json($data);
    }

    public function add(Request $request, Label $news){
    	$input = $request->all();
    	$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = Label::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'news label added';
    		$data['label'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'news label failed to add';
    	}
        
        return response()->json($data);
    }

    public function update(Request $request, Label $news,$id){
    	$input = $request->all();
        $input['modified_by'] = Auth::user()->id;

    	$type = Label::where('id', $id)->first();
    	if ($type->update($input)) return response()->json(['success' => 'data_updated'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id){
    	$delete = Label::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'Label deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'Label failed to delete';
    	}

    	return response()->json($data);
    }
}
