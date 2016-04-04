<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationNews extends Model
{
    protected $table = 'school_type';
	protected $fillable = [
        'news_category_id',
    	'name',
        'slug',
        'title',
        'content',
        'image_content',
        'image_cover',
        'date',
        'author',
        'ipaddress',
        'status'
    ];
    
    public function newsCategory() {
        return $this->belongsTo('App\NewsCategory');
    }
    
    public function author() {
        return $this->belongsTo('App\NewsCategory','author');
    }
    
    public function createdBy() {
        return $this->belongsTo('App\NewsCategory','created_by');
    }
    
    public function modifiedBy() {
        return $this->belongsTo('App\NewsCategory','modified_by');
    }
}
