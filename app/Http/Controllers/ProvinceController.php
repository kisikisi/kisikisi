<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProvinceController extends Controller
{
    public function index() {
    	$data['province'] = Province::all();
    	return json_encode($data);
    }
}
