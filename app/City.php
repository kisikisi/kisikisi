<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
	protected $fillable = [
    	'province_id',
        'name',
    ];
    
    public function province() {
        return $this->belongsTo('App\Province');
    }
    
    public function school() {
        return $this->hasMany('App\School');
    }
}
