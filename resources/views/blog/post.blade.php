@include('layouts.templates.logo')
@include('layouts.templates.nav')
@extends('layouts.app')

@section('title'){{ $post->title }} &mdash; {{ config('app.name') }}@endsection
@section('description'){{ $post->subtitle }}@endsection

@push('meta')
	<meta name="author" content="{{ $post->author->display_name }}">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="{{ env('META_TWITTER_SITE') }}" />
	<meta name="twitter:title" content="{{ $post->title }}">
	<meta name="twitter:description" content="{{ $post->subtitle }}">
	<meta name="twitter:image" content="{{ $post->bannerUrl }}" />
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{ $post->title }}">
	<meta property="og:description" content="{{ $post->subtitle }}">
	<meta property="og:image" content="{{ $post->bannerUrl }}">
	<meta property="og:url" content="{{ URL::current() }}">
	@foreach ($post->author->meta as $social)
		@if ($social->network == "social_twitter")
			<meta name="twitter:creator" content="{{ '@'.$social->account }}">
		@endif
	@endforeach
@endpush

@section('header')
	<header class="showcase" style="background-image: url('{{ $post->bannerUrl }}');">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-6">
			            @yield('logo-alt')
			        </div>
			        
			        <div class="col-xs-12 col-lg-6">
			            <nav>
			                @yield('navbar')
			            </nav>
			        </div>
				</div>
				
				<div class="postinfo">
					<h1>{{ $post->title }}</h1>
					
					@if ($post->subtitle)
						<h2>{{ $post->subtitle }}</h2>
					@endif
					
					<h3>
						by <a rel="author" href="{{ $post->author->permalink }}">{{ $post->author->display_name }}</a>
					</h3>
				</div>
			</div>
		</div>
	</header>
@endsection

@section('content')
	<div class="container">
		<article class="post">
			<section class="content">
				@if ($post->published_at === NULL)
					<div class="alert alert-warning">
						<span class="icon-alert"></span> This post has not been published yet.
					</div>
				@endif

				{!! $post->content !!}
			</section>

			<section class="meta">
				<div class="clearfix">
					<div class="extra">
						@if ($post->updated_at > $post->published_at)
							Last updated {{ $post->updated_at->format('l, j F Y \a\t h:i A') }}.
						@else
							Published on {{ $post->published_at->format('l, j F Y \a\t h:i A') }}.
						@endif
					</div>

					<div class="pull-xs-left">
						@foreach ($post->tags as $tag)
							<a class="post-tag" href="{{ $tag->permalink }}">
								{{ $tag->name }}
							</a>
						@endforeach
					</div>

					<div class="pull-xs-right">
						<ul class="list-inline social share">
							<li class="list-inline-item">
								<a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">
									<span class="icon-facebook" aria-hidden="true"></span>
								</a>
							</li>
							
							<li class="list-inline-item">
								<a href="https://twitter.com/home?status=&ldquo;{{ rawurlencode($post->title) }}&rdquo;%20{{ URL::current() }}">
									<span class="icon-twitter" aria-hidden="true"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>

				<hr>

				<div class="media user">
					<div class="media-left">
						<div class="avatar" style="background-image: url('{{ $post->author->avatarUrl }}');">
							<a rel="author" href="{{ $post->author->permalink }}"></a>
						</div>
					</div>
					
					<div class="media-body info">
						<a rel="author" class="author" href="{{ $post->author->permalink }}">
							{{ $post->author->display_name }}
						</a>
						
						<ul class="list-inline social">
							{{-- social links --}}
						</ul>
					</div>
				</div>
			</section>
		</article>
	</div>
@endsection