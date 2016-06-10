<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Scholarship extends Model
{
    use SoftDeletes;

    public $table = 'scholarships';
	protected $fillable = [
        'scholarship_degree_id',
    	'slug',
        'title',
        'instance',
        'deadline',
        'content',
        'requirement',
        'registration',
        'image_content',
        'image_cover',
        'link',
        'status',
        'created_by',
        'modified_by'
    ];

    public function scholarshipList() {
        return $this->select('id','title', 'slug', 'instance', 'deadline', 'status', 'image_cover');
    }

    public function scholarshipDegree() {
        return $this->belongsTo('App\ScholarshipDegree');
    }

    public function createdBy() {
        return $this->belongsTo('App\User','created_by');
    }

    public function modifiedBy() {
        return $this->belongsTo('App\User','modified_by');
    }

    /*public function scholarshipLabel() {
        //return $this->hasMany('App\ScholarshipLabel', 'scholarship_id');
        return $this->select(DB::raw("l.*"))
            ->join("scholarship_labels AS al", "al.scholarship_id", "=", "scholarships.id")
            ->join("labels AS l", "l.id", "=", "al.label_id");
    }*/
}
