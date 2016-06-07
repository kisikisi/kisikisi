<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationAgenda extends Model
{
    use SoftDeletes;
    
    public $table = 'education_agendas';
	protected $fillable = [
        'agenda_category_id',
    	'slug',
        'title',
        'city_id',
        'location',
        'start_datetime',
        'end_datetime',
        'image_cover',
        'image_content',
        'map_address',
        'content',
        'embed',
        'status',
        'created_by',
        'modified_by'
    ];
    
    public function agendaList() {
        return $this->select(DB::raw("education_agendas.id, education_agendas.title, education_agendas.slug, c.name as category, education_agendas.location, education_agendas.start_datetime, education_agendas.end_datetime, education_agendas.status, education_agendas.image_cover"))
            ->join("agenda_categories AS c", "c.id", "=", "education_agendas.agenda_category_id");
    }
    
    public function city() {
        return $this->belongsTo('App\City');
    }
    
    public function agendaCategory() {
        return $this->belongsTo('App\AgendaCategory');
    }
    
    public function createdBy() {
        return $this->belongsTo('App\User','created_by');
    }
    
    public function modifiedBy() {
        return $this->belongsTo('App\User','modified_by');
    }
    
    public function agendaLabel() {
        //return $this->hasMany('App\AgendaLabel', 'agenda_id');
        return $this->select(DB::raw("l.*"))
            ->join("agenda_labels AS al", "al.agenda_id", "=", "education_agendas.id")
            ->join("labels AS l", "l.id", "=", "al.label_id");
    }
}
