<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MOTD extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'motd';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    	'created_at'
    ];

    /**
     * Get the permanent URL for this message.
     *
     * @return string
     */
    public function getPermalinkAttribute() {
        return action('MOTDController@byDate', [
            $this->created_at->year,
            $this->created_at->format('m'),
            $this->created_at->format('d')
        ]);
    }

    /**
     * Determines whether this message is from the future.
     *
     * @return bool
     */
    public function getIsFutureAttribute() {
        return $this->created_at > new \DateTime;
    }

    /**
     * Get the background image URL for this message.
     *
     * @return string
     */
    public function getBackgroundUrlAttribute() {
        $baseUrl = config('filesystems.disks.storage.url').'/banners/motd';

        if (empty($this->background) || !\Storage::disk('storage')->exists('banners/motd/'.$this->background.'.jpg')) {
            // Attempt to use previous background if possible.
            $last_background = MOTD::whereNotNull('background')
                ->where('created_at', '<', $this->created_at)
                ->orderBy('created_at', 'desc')
                ->first();

            return $last_background ? $last_background->backgroundUrl: $baseUrl.'/default.jpg';
        }
        
        return $baseUrl.'/'.$this->background.'.jpg';
    }

    /**
     * Get the previous message of the day.
     *
     * @return App\MOTD
     */
    public function getPreviousAttribute() {
        return MOTD::where('created_at', '<', $this->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * Get the next message of the day.
     *
     * @return App\MOTD
     */
    public function getNextAttribute() {
        return MOTD::where('created_at', '>', $this->created_at)
            ->where('created_at', '<', new \DateTime)
            ->orderBy('created_at', 'asc')
            ->first();
    }
}
