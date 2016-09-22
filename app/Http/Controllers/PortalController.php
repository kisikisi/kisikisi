<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use DB;
use Auth;
use Entrust;
use App\Http\Controllers\Auth\AuthController;

class PortalController extends Controller
{
	public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}

    public function index() {
    	$data = DB::table('style')->first();
    	
    	return view('portal', ['data'=>$data]);
    }

    public function style() {
    	$data = DB::table('style')->first();

    	return response()->json($data);
    }

    public function update() {
    	$input = $request->all();

    	$update = DB::table('style')->where('id', $id)->first();
    	if ($update->update($input)) {
            $data = DB::tables('style')->first();
            return response()->json(['status' => 'success',  'message' => 'portal style updated', 'news' => $data], 200, [], JSON_NUMERIC_CHECK);
        } else return response()->json(['status' => 'error', 'message' => 'fail to update data'], 500);
    }

    public function uploadHeader() {
        $logo = Input::file('image');
    	
    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/public/img';
            $filename = time() . '.' . $logo->getClientOriginalExtension();
	        if(!$logo->move($destinationPath, $filename)) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload', 'header' => $filename], 200);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'empty'], 400);
		}
    }

    public function uploadContent() {
    	$icon = Input::file('image');
    	
    	//var_dump($icon);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/public/img/';
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
}
