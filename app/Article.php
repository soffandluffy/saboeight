<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Article extends Model
{
    //
    use HasTrixRichText;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    	'publishedAt', 
    	'updatedAt', 
    	'created_at', 
    	'updated_at'
    ];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'publishedAt', 'updatedAt', 'imageurl', 'content', 'status', 'author'
    ];

    public function category(){
    	return $this->belongsTo('App\ArticleCategory', 'category_id');
    }

    /**
     * Get the article's comment.
     */
    public function comments() {
        return $this->morphMany('Comment','commentable');
    }

}
