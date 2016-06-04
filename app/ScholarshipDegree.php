<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScholarshipDegree extends Model
{
    protected $table = 'scholarship_degrees';
	protected $fillable = [
		'slug',
    	'name',
        'created_by',
        'modified_by'
    ];

    public function scholarship() {
        return $this->hasMany('App\Scholarship');
    }
}
