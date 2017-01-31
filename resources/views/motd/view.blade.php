@section('title'){{ $title }} &mdash; {{ env('BLOG_TITLE') }}@endsection

@push('styles')
	#banner { background-image: url('{{ $message->backgroundUrl }}'); }
@endpush

@push('meta')
	<link rel="canonical" href="{{ $message->permalink }}">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="{{ env('META_TWITTER_SITE') }}">
	<meta name="twitter:title" content="{{ $title }}">
	<meta name="twitter:description" content="{{ $description }}">
	<meta name="twitter:image" content="{{ $message->backgroundUrl }}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{ $title }}">
	<meta property="og:description" content="{{ $description }}">
	<meta property="og:image" content="{{ $message->backgroundUrl }}">
	<meta property="og:url" content="{{ $message->permalink }}">
@endpush

@include('layouts.templates.header')
@include('layouts.templates.nav')

{{-- previous/forward navigation --}}
@section('motd-navigation')
	@if ($message->previous)
		<a title="Previous" href="{{ $message->previous->permalink }}">
			<small class="icon-chevron-left"></small>
		</a>
	@endif
	
	{{ strtoupper($message->created_at->format('F d, Y')) }}
	
	@if ($message->next)
		<a title="Next" href="{{ $message->next->permalink }}">
			<small class="icon-chevron-right"></small>
		</a>
	@endif
@endsection

<!DOCTYPE html>
<html lang="{{ env('BLOG_LANGUAGE') }}">
	@yield('headerinclude')
	<body>
		<main>
			<header class="showcase motd" id="banner">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-lg-6">
								<div class="logo" id="logo-alt">
								   <a href="{{ action('BlogController@index') }}">
										<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 200 29" version="1.1" style="fill: white;">
											{!! file_get_contents('../resources/assets/img/logo.svg') !!}
										</svg>
									</a>
								</div>
							</div>
							
							<div class="col-xs-12 col-lg-6">
								<nav>
									@yield('navbar')
								</nav>
							</div>
						</div>

						<div class="content">
							<section>
								@if ($message->youtube)
									<div class="embed embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="//youtube.com/embed/{{ $message->youtube }}" allowfullscreen></iframe>
									</div>
								@endif

								<div class="message">
									<span class="header">MESSAGE OF THE DAY</span>

									<div class="navigation">
										@yield('motd-navigation')
									</div>
									
									@if ($message->content)
										<p class="italic">&ldquo;{!! $message->content !!}&rdquo;</p>
									@elseif (!$message->youtube)
										<p>Nothing here for this day.</p>
									@endif

									<div class="share">
										<ul class="list-inline">
											<li class="list-inline-item">
												<a href="https://www.facebook.com/sharer/sharer.php?u={{ $message->permalink }}">
													<span class="icon-facebook"></span>
												</a>
											</li>

											<li class="list-inline-item">
												<a href="https://twitter.com/home?status={{ $title.' '.$message->permalink }}">
													<span class="icon-twitter"></span>
												</a>
											</li>
										</ul>
									</div>

									<span class="footer">
										&mdash; {{ strtoupper(env('BLOG_TITLE')) }} &mdash;
									</span>
								</div>
							</section>
						</div>
					</div>
				</div>
			</header>
		</main>
	</body>
</html>