<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        return view('blog.posts');
    }

    /**
     * Queries the post list by specified tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function byTag(Tag $tag)
    {
    	return dump($tag);
    }

    /**
     * Queries the post list by specified user.
     *
     * @return \Illuminate\Http\Response
     */
    public function byUser(User $user)
    {
    	return dump($user);
    }

    /**
     * Queries the post list by specified year.
     *
     * @return \Illuminate\Http\Response
     */
    public function byYear($year)
    {
    	return $year;
    }

    /**
     * Queries the post list by specified year and month.
     *
     * @return \Illuminate\Http\Response
     */
    public function byMonth($year, $month)
    {
    	return $year.' -> '.$month;
    }
}
