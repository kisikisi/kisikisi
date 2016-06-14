<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';
	protected $fillable = [
        'slug',
        'title',
        'author_id',
        'description',
        'duration',
        'difficulty',
        'image_cover',
        'embed',
        'status',
        'created_by',
        'modified_by'
    ];

    public function courseList() {
        return $this->select(DB::raw('courses.id, courses.slug, courses.title, users.name as username,courses.image_cover, courses.status'))
			->join('users','courses.author_id','=','users.id')
			->orderBy('id','desc');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }

    public function createdBy() {
        return $this->belongsTo('App\User','created_by');
    }

    public function modifiedBy() {
        return $this->belongsTo('App\User','modified_by');
    }

    public function courseLabel() {
        return $this->select(DB::raw("l.*"))
            ->join("course_labels AS cl", "cl.course_id", "=", "courses.id")
            ->join("labels AS l", "l.id", "=", "cl.label_id");
    }
}
