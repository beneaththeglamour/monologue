<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'display_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Get blog posts created by this user.
     *
     * @return App\Post
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'author_id');
    }

    /**
     * Get metadata values assigned to this user.
     *
     * @return App\Post
     */
    public function meta()
    {
        return $this->hasMany('App\Usermeta', 'user_id');
    }

    /**
     * Get the permanent URL for querying posts by this author.
     *
     * @return string
     */
    public function getPermalinkAttribute()
    {
        return action('BlogController@byUser', $this->name);
    }

    /**
     * Get the URL of the user avatar image.
     *
     * @return string
     */
    public function getAvatarUrlAttribute() {
        // TODO
        return 'https://i.imgur.com/lLxABPP.png';
    }

    /**
     * Get the URL of the user banner image.
     *
     * @return string
     */
    public function getBannerUrlAttribute() {
        // TODO
        return 'https://i.imgur.com/pcCSeO0.jpg';
    }
}
