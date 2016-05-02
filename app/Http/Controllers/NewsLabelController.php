<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\NewsLabel;

class NewsLabelController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index']]);
	}
    
    public function index() {
        
    }
    
    public function add($news_id, $label_id) {
        $input['news_id'] = $news_id;
        $input['label_id'] = $label_id;
        
        $save = NewsLabel::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'news label added';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'news label failed to add';
    	}
    	return response()->json($data);
    }
    
    public function remove($news_id, $label_id) {
        $delete = NewsLabel::where('news_id', $news_id)->where('label_id', $label_id)->delete();

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
