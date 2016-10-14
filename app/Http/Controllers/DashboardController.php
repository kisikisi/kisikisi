<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SchoolDirectory;
use App\EducationNews;
use App\EducationAgenda;
use App\Scholarship;
use App\Course;

class DashboardController extends Controller {
    public function __construct() {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth');
    }

	public function index() {
        $data = [
			'directories_count' => SchoolDirectory::count(),
			'news_count' => EducationNews::count(),
			'agendas_count' => EducationAgenda::count(),
			'courses_count' => Course::count(),
			'scholarships_count' => scholarship::count()
		];

		return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
	}
}
