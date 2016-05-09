<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsCategory extends Model
{
    use SoftDeletes;
    
    protected $table = 'news_categories';
	protected $fillable = [
    	'name',
        'created_by',
        'modified_by'
    ];
    
    public function educationNews() {
        return $this->hasMany('App\EducationNews');
    }
}
