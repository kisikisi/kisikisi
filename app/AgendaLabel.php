<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaLabel extends Model
{
    protected $table = 'agenda_labels';
    public $timestamps = false;
	protected $fillable = [
    	'id',
        'agenda_id',
    	'label_id'
    ];
    
    public function agenda() {
        return $this->belongsTo('App\EducationAgenda');
    }
    
    public function label() {
        return $this->belongsTo('App\Label');
    }
}
