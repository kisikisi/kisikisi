<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CityController extends Controller
{
    public function index() {
    	$data['city'] = City::all();
    	return json_encode($data);
    }
}
