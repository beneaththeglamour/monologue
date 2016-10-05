<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermeta extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'usermeta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    /**
     * Get the CSS icon class for this social network.
     *
     * @return string
     */
    public function getIconAttribute() {
        switch ($this->key) {
            case "social_twitch":
                return "icon-twitch";
            case "social_github":
                return "icon-github";
            case "social_steam":
                return "icon-steam";
            case "social_twitter":
                return "icon-twitter";
            case "social_facebook":
                return "icon-facebook";
            case "social_lastfm":
                return "icon-lastfm";
            case "social_youtube":
                return "icon-youtube";
            case "social_skype":
                return "icon-skype";
            case "social_email":
                return "icon-email";
            case "social_phone":
                return "icon-phone";
            default:
                return "icon-globe";
        }
    }
}
