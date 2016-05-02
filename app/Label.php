<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'labels';
    public $timestamps = false;
	protected $fillable = [
    	'id',
        'name'
    ];
    
    public function newsLabel() {
        return $this->hasMany('App\NewsLabel');
    }
}
