@include('layouts.templates.nav')

@push('scripts')
	<script src="{{ env('ELIXIR_BASE_URL').elixir('js/monologue.js', env('ELIXIR_DIRECTORY')) }}"></script>
@endpush

@section('headerinclude')
	<head>
	    <title>@yield('title', env('BLOG_TITLE'))</title>
	    
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="theme-color" content="#5E5E5E">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="@yield('description', env('BLOG_DESCRIPTION'))">
		@stack('meta')

	    <link rel="icon" href="{{ env('ELIXIR_BASE_URL').elixir('img/favicon.png', env('ELIXIR_DIRECTORY')) }}">
	    <link href="{{ env('ELIXIR_BASE_URL').elixir('css/monologue.css', env('ELIXIR_DIRECTORY')) }}" rel="stylesheet">
	    @stack('link')

	    <style type="text/css">
	       	@stack('styles')
	    </style>
	</head>
@endsection

@section('header')
	<header class="main">
		<div class="container">
		    <div class="row">
		        <div class="col-xs-12 col-lg-6">
    	            <div class="logo" id="logo">
                	    <a href="{{ env('APP_URL') }}">
                	    	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 172 32" version="1.1">
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
		</div>
	</header>
@endsection