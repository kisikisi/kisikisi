<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\EducationNews;
use App\NewsCategory;
use App\Label;
use Auth;
use Entrust;
use App\Http\Controllers\Auth\AuthController;

class EducationNewsController extends Controller
{
    public function __construct(){
		$this->middleware('jwt.auth', ['except'=>['index','detail','scroll','form']]);
	}

	public function index(EducationNews $news){
    	$data['news'] = $news->newsList()->get();
    	return response()->json($data);
    }

	public function scroll($after, $limit, EducationNews $news, Request $request, AuthController $auth) {
		$news_category_id = $request->input('news_category_id');
		$title = $request->input('title');

    	$lists = $news->newsList()
			->orderBy($news->table.'.id', 'desc')
			->take($limit);

		if (!$user = $auth->getAuthUser())  $lists->where('status', 1);
		else if (!$user->hasRole(['admin','manager'])) $lists->where('status', 1);

		if (! Entrust::hasRole(['admin','manager'])) $lists->where('status', 1);
		if (!empty($news_category_id)) $lists->where('news_category_id', $news_category_id);
        if (!empty($title)) $lists->where($news->table.'.title', 'like', "%$title%");

		if ($after != 0) $lists->where($news->table.'.id','<', $after);
        $data['news'] = $lists->get();

		for ($i=0;$i < count($data['news']); $i++ ) {
			$data['news'][$i]->content = utf8_encode(substr(strip_tags($data['news'][$i]->content), 0, 100));
		}
		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function form() {
        $data['newsCategories'] = NewsCategory::all();
        $data['labels'] = Label::all();
    	return response()->json($data);
    }
    
    public function uploadCover() {
        $logo = Input::file('image');
    	
    	//var_dump($logo);
    	if (Input::hasFile('image')) {
	        $destinationPath = base_path() . '/storage/files/news/cover/';
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
	        $destinationPath = base_path() . '/storage/files/news/content/';
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
    
    public function add(Request $request, EducationNews $news){
    	$input = $request->all();
        $input['author'] = Auth::user()->id;
        $input['date'] = strtotime($input['date']);
    	$input['created_by'] = Auth::user()->id;
        $input['modified_by'] = Auth::user()->id;

        $save = EducationNews::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'education news added';
    		$data['news'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'education news  failed to add';
    	}
        return response()->json($data);
    }

    public function detail($id){
        $data['detail'] = EducationNews::with(["newsCategory",'author'])->find($id);
        $data['newsLabel'] = EducationNews::find($id)->newsLabel()->get();
        return response()->json($data);
    }

    public function update(Request $request, EducationNews $news,$id){
    	$input = $request->all();
        $input['date'] = strtotime($input['date']);
        $input['modified_by'] = Auth::user()->id;

    	$update = EducationNews::where('id', $id)->first();
    	if ($update->update($input)) {
            $data = $news->newsList()->where($news->table.'.id', $id)->get();
            return response()->json(['status' => 'success',  'message' => 'news data updated', 'news' => $data], 200, [], JSON_NUMERIC_CHECK);
        } else return response()->json(['status' => 'error', 'message' => 'fail to update data'], 500);
    }

    public function delete($id){
    	$delete = EducationNews::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'News deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'News failed to delete';
    	}

    	return response()->json($data);
    }
}
