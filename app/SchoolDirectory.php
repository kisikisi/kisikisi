<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class SchoolDirectory extends Model
{
    protected $table = 'school_directory AS s';
	protected $fillable = [
    	'school_type_id',
        'name',
        'address',
        'map_address',
        'phone',
        'email',
        'website',
        'logo',
        'images',
        'city_id',
        'description',
        'data',
        'created_by',
        'modified_by'
    ];
    
    public function schoolList() {
        return $this->select(DB::raw("s.id, s.name, s.logo, s.images, t.name AS type, c.name AS city"))
                ->join("school_type AS t", "t.id", "=", "s.school_type_id")
                ->join("city AS c", "c.id", "=", "s.city_id");
    }

    public function schoolType() {
        return $this->belongsTo('App\SchoolType');
    }
    
    public function city() {
        return $this->belongsTo('App\City');
    }
    
    public function createdBy() {
        return $this->belongsTo('App\NewsCategory','created_by');
    }
    
    public function modifiedBy() {
        return $this->belongsTo('App\NewsCategory','modified_by');
    }
}
