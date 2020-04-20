<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    	'birthdate'
    ];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'avatar', 
        'twitter', 
        'facebook', 
        'github', 
        'instagram', 
        'linkedin', 
        'website',
        'fav_music',
        'fav_movies',
        'birthdate',
        'country',
        'languages',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'fav_music' => 'array',
        'fav_movies' => 'array',
        'languages' => 'array',
    ];

}
