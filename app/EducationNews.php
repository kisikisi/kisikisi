<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class EducationNews extends Model
{
    protected $table = 'education_news';
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
        return $this->select(DB::raw("n.id, n.title, c.name as category, n.date, u.name AS author, n.status, n.image_cover"))
            ->from('education_news as n')
            ->join("users AS u", "u.id", "=", "n.author")
            ->join("news_category AS c", "c.id", "=", "n.news_category_id");
    }
    
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
    
    public function newsLabel() {
        //return $this->hasMany('App\NewsLabel', 'news_id');
        return $this->select(DB::raw("l.*"))
            ->join("news_labels AS nl", "nl.news_id", "=", "education_news.id")
            ->join("labels AS l", "l.id", "=", "nl.label_id");
    }
}
