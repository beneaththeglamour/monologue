@push('styles')
	#banner { background-image: url('{{ $message->backgroundUrl }}'); }
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

{{-- social sharing links --}}
@section('motd-share')
	<div class="share">
		<ul class="list-inline">
			<li class="list-inline-item">
				<a href="https://www.facebook.com/sharer/sharer.php?u={{ $message->permalink }}">
					<span class="icon-facebook"></span>
				</a>
			</li>

			<li class="list-inline-item">
				<a href="https://twitter.com/home?status={{ 'Message of the Day: '.$message->created_at->format('F d, Y').' '.$message->permalink }}">
					<span class="icon-twitter"></span>
				</a>
			</li>
		</ul>
	</div>	
@endsection

{{-- footer --}}
@section('motd-footer')
	<span class="footer">
		&mdash; {{ strtoupper(env('BLOG_TITLE')) }} &mdash;
	</span>
@endsection

{{-- generic layout with no video --}}
@section('motd-layout-generic')
	<div class="message">
		@if ($message->content)
			<span class="header">MESSAGE OF THE DAY</span>

			<div class="navigation">
				@yield('motd-navigation')
			</div>

			<p>&ldquo;{!! $message->content !!}&rdquo;</p>
		@else
			<div class="navigation">
				@yield('motd-navigation')
			</div>

			<p>Nothing here for this day.</p>
		@endif

		@yield('motd-share')
		@yield('motd-footer')
	</div>
@endsection

{{-- youtube video with optional message --}}
@section('motd-layout-video')
	<div class="embed embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="//youtube.com/embed/{{ $message->youtube }}" allowfullscreen></iframe>
	</div>

	<div class="message">
		@if ($message->content)
			<span class="header">MESSAGE OF THE DAY</span>

			<div class="navigation">
				@yield('motd-navigation')
			</div>

			<p>&ldquo;{!! $message->content !!}&rdquo;</p>
		@else
			<div class="navigation">
				@yield('motd-navigation')
			</div>
		@endif

		@yield('motd-share')
		@yield('motd-footer')
	</div>
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
	        	            	    <a href="{{ url('/') }}"></a>
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
				        			@yield('motd-layout-video')
				        		@else
				        			@yield('motd-layout-generic')
				        		@endif
	    			        </section>
    			        </div>
	        		</div>
	        	</div>
	        </header>
        </main>
    </body>
</html>