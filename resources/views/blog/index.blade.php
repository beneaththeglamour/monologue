@extends('layouts.app')

@section('content')
    @if (isset($filter))
        @include('layouts.templates.header-filters')

        @if (array_key_exists('user', $filter))
            @yield('index-filter-user')
        @else
            @yield('index-filter-generic')
        @endif
    @endif

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
    </div>
@endsection
