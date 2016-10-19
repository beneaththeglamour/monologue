<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MOTD;

class MOTDController extends Controller
{
	/**
	 * Display the latest message of the day.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function latest() {
    	// Show the latest message, ignore messages from the future.
		$message = MOTD::orderBy('created_at', 'desc')
			->where('created_at', '<=', new \DateTime)
			->limit(1)
			->first();

		if (!$message) {
			// No messages.
			return abort(404);
		}
		
		return view('motd.view', [
			'title' => 'Message of the Day: '.$message->created_at->format('F d, Y'),
			'description' => 'The message of the day, brought to you by '.env('BLOG_TITLE').'.',
			'message' => $message
		]);
	}

	/**
	 * Displays a message from a specific date.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function byDate($year, $month, $day) {
		$message = MOTD::whereYear('created_at', '=', $year)
			->whereMonth('created_at', '=', $month)
			->whereDay('created_at', '=', $day)
			->first();

		// Only allowed signed in users to view messages from the future.
		if (!$message || ($message->isFuture && !\Auth::user())) {
			return abort(404);
		}

		return view('motd.view', [
			'title' => 'Message of the Day: '.$message->created_at->format('F d, Y'),
			'description' => 'The message of the day, brought to you by '.env('BLOG_TITLE').'.',
			'message' => $message
		]);
	}
}
