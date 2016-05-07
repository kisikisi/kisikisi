<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolDirectory extends Model
{
    use SoftDeletes;
    protected $table = 'school_directory';
	protected $fillable = [
    	'school_type_id',
        'name',
        'address',
        'map_address',
        'phone',
        'email',
        'website',
        'logo',
        'image',
        'city_id',
        'description',
        'data',
        'created_by',
        'modified_by'
    ];
    
    public function schoolList() {
        return $this->select(DB::raw("s.id, s.name, s.logo, s.image, t.name AS type, c.name AS city"))
                ->from('school_directory as s')
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
