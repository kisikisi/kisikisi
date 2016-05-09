<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
	protected $fillable = [
    	'id',
        'name',
    ];
    
    public function city() {
        return $this->hasMany('App\City');
    }
}
