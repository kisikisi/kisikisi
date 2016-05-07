<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaCategory extends Model
{
    protected $table = 'agenda_category';
	protected $fillable = [
    	'name',
        'created_by',
        'modified_by'
    ];
    
    public function educationAgenda() {
        return $this->hasMany('App\EducationAgenda');
    }
}
