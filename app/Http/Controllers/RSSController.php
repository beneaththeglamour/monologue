<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Tag;

class RSSController extends Controller
{
    /**
     * Show the most recent published posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Response::view('blog.rss', [
            'posts' => Post::whereNotNull('published_at')
                    ->orderBy('published_at', 'desc')
                    ->limit(env('BLOG_RSS_MAX_POSTS'))
                    ->get()
        ])->header('Content-Type', 'application/rss+xml');
    }

    /**
     * Queries the post list by specified tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function byTag(Tag $tag)
    {
        return \Response::view('blog.rss', [
            'tag' => $tag,
            'posts' => $tag->posts()
                    ->whereNotNull('published_at')
                    ->orderBy('published_at', 'desc')
                    ->limit(env('BLOG_RSS_MAX_POSTS'))
                    ->get()
        ])->header('Content-Type', 'application/rss+xml');
    }

    /**
     * Queries the post list by specified user.
     *
     * @return \Illuminate\Http\Response
     */
    public function byUser(User $user)
    {
        return \Response::view('blog.rss', [
            'user' => $user,
            'posts' => $user->posts()
                    ->whereNotNull('published_at')
                    ->orderBy('published_at', 'desc')
                    ->limit(env('BLOG_RSS_MAX_POSTS'))
                    ->get()
        ])->header('Content-Type', 'application/rss+xml');
    }

    /**
     * Queries the post list by specified year.
     *
     * @return \Illuminate\Http\Response
     */
    public function byYear($year)
    {
        return \Response::view('blog.rss', [
            'year' => $year,
            'posts' => Post::whereNotNull('published_at')
                    ->whereYear('published_at', '=', $year)
                    ->orderBy('published_at', 'desc')
                    ->limit(env('BLOG_RSS_MAX_POSTS'))
                    ->get()
        ])->header('Content-Type', 'application/rss+xml');
    }

    /**
     * Queries the post list by specified year and month.
     *
     * @return \Illuminate\Http\Response
     */
    public function byMonth($year, $month)
    {
        return \Response::view('blog.rss', [
            'year' => $year,
            'month' => $month,
            'posts' => Post::whereNotNull('published_at')
                    ->whereYear('published_at', '=', $year)
                    ->whereMonth('published_at', '=', $month)
                    ->orderBy('published_at', 'desc')
                    ->limit(env('BLOG_RSS_MAX_POSTS'))
                    ->get()
        ])->header('Content-Type', 'application/rss+xml');
    }
}
