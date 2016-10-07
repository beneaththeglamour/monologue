@include('layouts.templates.logo')
@include('layouts.templates.nav')

@section('headerinclude')
	<head>
	    <title>@yield('title', env('BLOG_TITLE'))</title>
	    
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="theme-color" content="#5E5E5E">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="@yield('description', env('BLOG_DESCRIPTION'))">
		@stack('meta')

	    <link rel="icon" href="{{ elixir('img/favicon.png', 'monologue') }}">
	    <link href="{{ elixir('css/monologue.css', 'monologue') }}" rel="stylesheet">
	    @stack('link')
	</head>
@endsection

@section('header')
	<header>
		<div class="container">
		    <div class="row">
		        <div class="col-xs-12 col-lg-6">
		            @yield('logo')
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