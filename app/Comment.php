<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    	'posted_at'
    ];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'article_id', 'content', 'posted_at'
    ];

    /**
     * Get the owning commentable model.
     */
    public function commentable()
    {
        return $this->morphTo();
    }



}
