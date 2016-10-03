<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a specific blog post.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($year, $month, Post $post) {
		if ($post->created_at->year != $year || $post->created_at->format("m") != $month)
			return abort(404);
        
        return view('blog.post', [
            'post' => $post
        ]);
    }
}
