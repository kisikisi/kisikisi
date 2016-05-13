<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLabel extends Model
{
    protected $table = 'news_labels';
    public $timestamps = false;
	protected $fillable = [
    	'id',
        'news_id',
    	'label_id'
    ];
    
    public function news() {
        return $this->belongsTo('App\EducationNews');
    }
    
    public function label() {
        return $this->belongsTo('App\Label');
    }
}
