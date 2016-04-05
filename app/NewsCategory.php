<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
	protected $fillable = [
    	'name',
        'created_by',
        'modified_by'
    ];
    
    public function educationNews() {
        return $this->hasMany('App\EducationNews');
    }
}
