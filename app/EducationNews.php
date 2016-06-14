<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationNews extends Model
{
    
    use SoftDeletes;
    
    public $table = 'education_news';
	protected $fillable = [
        'news_category_id',
    	'slug',
        'title',
        'content',
        'image_content',
        'image_cover',
        'date',
        'author',
        'ipaddress',
        'status',
        'created_by',
        'modified_by'
    ];
    
    public function newsList() {
        return $this->select(DB::raw("education_news.id, education_news.title,education_news.content, c.name as category, education_news.date, u.name AS author, education_news.status, education_news.image_cover"))
            ->join("users AS u", "u.id", "=", "education_news.author")
            ->join("news_categories AS c", "c.id", "=", "education_news.news_category_id");
    }
    
    public function newsCategory() {
        return $this->belongsTo('App\NewsCategory');
    }
    
    public function author() {
        return $this->belongsTo('App\User','author');
    }
    
    public function createdBy() {
        return $this->belongsTo('App\User','created_by');
    }
    
    public function modifiedBy() {
        return $this->belongsTo('App\User','modified_by');
    }
    
    public function newsLabel() {
        //return $this->hasMany('App\NewsLabel', 'news_id');
        return $this->select(DB::raw("l.*"))
            ->join("news_labels AS nl", "nl.news_id", "=", "education_news.id")
            ->join("labels AS l", "l.id", "=", "nl.label_id");
    }
}
