@extends('layouts.app')
@include('layouts.templates.header-filters')

@section('content')
    @yield('index-filters')

    <div class="container index">
        @foreach ($posts as $key => $post)
            <article class="index">
                <header>
                    <h1>
                        <a href="{{ $post->permalink }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    
                    <h2>
                        {{ $post->created_at->format('F d, Y') }} &mdash; by <a href="{{ $post->author->permalink }}">{{ $post->author->display_name }}</a>
                    </h2>
                </header>

                <section class="content">
                    <p>{!! nl2br($post->summary) !!}</p>
                </section>
                
                <section class="meta clearfix">
                    <div class="pull-xs-left extra">
                        <a class="continue" href="{{ $post->permalink }}">
                            Continue reading..
                        </a>
                    </div>

                    <div class="pull-xs-right">
                        @foreach ($post->tags as $tag)
                            <a class="post-tag" href="{{ $tag->permalink }}">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </section>

                @if (!$loop->last)
                <hr>
                @endif
            </article>
        @endforeach

        @if ($posts->lastPage() !== 1)
            <div class="pagination">
                @if ($posts->currentPage() !== 1)
                    <a title="Previous page" href="{{ $posts->previousPageUrl() }}">
                        <span class="icon-chevron-left"></span>
                    </a>
                @endif
                
                <span class="separator">
                    PAGE {{ $posts->currentPage() }} OF {{ $posts->lastPage() }}
                </span>
                
                @if ($posts->hasMorePages())
                    <a title="Next page" href="{{ $posts->nextPageUrl() }}">
                        <span class="icon-chevron-right"></span>
                    </a>
                @endif
            </div>
        @endif
    </div>
@endsection
