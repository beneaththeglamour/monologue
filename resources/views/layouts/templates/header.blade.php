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

	    <style type="text/css">
    		#logo {
    			background-image: url('{{ elixir('img/logo.png', 'monologue') }}');
    			background-image: linear-gradient(transparent, transparent), url('{{ elixir('img/logo.svg', 'monologue') }}');
    		}

    		#logo-alt {
    			background-image: url('{{ elixir('img/logo-alt.png', 'monologue') }}');
    			background-image: linear-gradient(transparent, transparent), url('{{ elixir('img/logo-alt.svg', 'monologue') }}');
    		}

	    	@stack('styles')
	    </style>
	</head>
@endsection

@section('header')
	<header>
		<div class="container">
		    <div class="row">
		        <div class="col-xs-12 col-lg-6">
    	            <div class="logo" id="logo">
                	    <a href="{{ action('BlogController@index') }}"></a>
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