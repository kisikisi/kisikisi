<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLabel extends Model
{
    protected $table = 'course_labels';
    public $timestamps = false;
	protected $fillable = [
    	'id',
        'course_id',
    	'label_id'
    ];

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function label() {
        return $this->belongsTo('App\Label');
    }
}
