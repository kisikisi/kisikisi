<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolType extends Model
{
    protected $table = 'school_type';
	protected $fillable = [
    	'name',
        'created_by',
        'modified_by'
    ];
    
    public function schoolDirectory() {
        return $this->hasMany('App\SchoolDirectory');
    }
    
    public function createdBy() {
        return $this->belongsTo('App\NewsCategory','created_by');
    }
    
    public function modifiedBy() {
        return $this->belongsTo('App\NewsCategory','modified_by');
    }
}
