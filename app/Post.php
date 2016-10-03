<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'title', 'subtitle', 'slug',
        'summary', 'content'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    	'created_at',
    	'updated_at',
    	'published_at'
    ];

    /**
     * Get the user who created this post.
     *
     * @return App\User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * Get tags assigned to this post.
     *
     * @return App\Tag
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the permanent URL for this blog post.
     *
     * @return string
     */
    public function getPermalinkAttribute() {
        return action('PostController@view', [$this->created_at->year, $this->created_at->format("m"), $this->slug]);
    }

    /**
     * Get the URL of the post banner image.
     *
     * @return string
     */
    public function getBannerUrlAttribute() {
        // TODO
        return 'https://i.imgur.com/ltb1MkC.jpg';
    }
}
