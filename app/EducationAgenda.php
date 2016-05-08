<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationAgenda extends Model
{
    use SoftDeletes;
    
    protected $table = 'education_agendas';
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
        return $this->select(DB::raw("education_agenda.id, education_agenda.title, c.name as category, education_agenda.location, education_agenda.start_datetime, education_agenda.end_datetime, education_agenda.status, education_agenda.image_cover"))
            ->join("agenda_category AS c", "c.id", "=", "education_agenda.agenda_category_id");
    }
    
    public function city() {
        return $this->belongsTo('App\City');
    }
    
    public function agendaCategory() {
        return $this->belongsTo('App\AgendaCategory');
    }
    
    public function createdBy() {
        return $this->belongsTo('App\AgendaCategory','created_by');
    }
    
    public function modifiedBy() {
        return $this->belongsTo('App\AgendaCategory','modified_by');
    }
    
    public function agendaLabel() {
        //return $this->hasMany('App\AgendaLabel', 'agenda_id');
        return $this->select(DB::raw("l.*"))
            ->join("agenda_labels AS al", "al.agenda_id", "=", "education_agenda.id")
            ->join("labels AS l", "l.id", "=", "al.label_id");
    }
}
