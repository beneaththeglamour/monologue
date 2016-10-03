<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Tag;

class BlogController extends Controller
{
    /**
     * Show the most recent published posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index', [
            // TODO: Add some function to filter out unpublished posts.
            // TODO: Add pagination to each of these index methods.
            'posts' => Post::all()
        ]);
    }

    /**
     * Queries the post list by specified tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function byTag(Tag $tag)
    {
    	return view('blog.index', [
            'posts' => $tag->posts,
            'filter' => [
                'tag' => $tag
            ]
        ]);
    }

    /**
     * Queries the post list by specified user.
     *
     * @return \Illuminate\Http\Response
     */
    public function byUser(User $user)
    {
    	return view('blog.index', [
            'posts' => $user->posts,
            'filter' => [
                'user' => $user
            ]
        ]);
    }

    /**
     * Queries the post list by specified year.
     *
     * @return \Illuminate\Http\Response
     */
    public function byYear($year)
    {
    	return view('blog.index', [
            'posts' => Post::whereYear('published_at', '=', $year)->get()
        ]);
    }

    /**
     * Queries the post list by specified year and month.
     *
     * @return \Illuminate\Http\Response
     */
    public function byMonth($year, $month)
    {
    	return view('blog.index', [
            'posts' => Post::whereYear('published_at', '=', $year)->whereMonth('published_at', '=', $month)->get()
        ]);
    }
}
