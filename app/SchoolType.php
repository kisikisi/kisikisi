<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolType extends Model
{
    use SoftDeletes;
    protected $table = 'school_type';
	protected $fillable = [
    	'name',
        'alias',
        'group',
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
