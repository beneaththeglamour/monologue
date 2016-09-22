@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div style="margin: 4em auto; max-width: 800px;">
            @foreach (App\Post::all() as $key => $post)
                <article id="post-{{ $key }}">
                    <h2>
                        <a href="{{ $post->permalink }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <h6>by <a href="{{ $post->author->permalink }}">{{ $post->author->display_name }}</a></h6>

                    <p style="margin-top: 1.5em;">{{ $post->summary }}</p>

                    <small class="text-muted">
                        <b>Tags:</b>

                        @foreach ($post->tags as $tag)
                            <a href="{{ $tag->permalink }}">
                                {{ $tag->name.(!$loop->last ? ',': '') }}
                            </a>
                        @endforeach
                    </small>
                </article>

                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
