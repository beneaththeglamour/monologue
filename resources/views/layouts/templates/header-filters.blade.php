@section('index-filter-tag')
	@if (isset($tag))
		@push('styles')
			#banner { background-image: url('{{ $tag->bannerUrl }}'); }
		@endpush

		<header class="showcase showcase-index" id="banner">
		    <div class="overlay">
		        <div class="container">
		            <div class="postinfo text-xs-center">
		                <h1>{{ $tag->name }}</h1>
		                <h2>{{ $tag->description }}</h2>
		                <h3>{{ $posts->total() }} {{ strtoupper(str_plural('post', $posts->total())) }}</h3>
		            </div>
		        </div>
		    </div>
		</header>
	@endif
@endsection

@section('index-filter-user')
	@if (isset($user))
		@push('styles')
			#banner { background-image: url('{{ $user->bannerUrl }}'); }
		@endpush
		
		<header class="showcase showcase-index showcase-index-user" id="banner">
		    <div class="overlay">
		        <div class="container">
		            <div class="postinfo text-xs-center">
	            	    <div class="avatar">
		                    <img class="img-circle" src="{{ $user->avatarUrl }}">
		                </div>
	                
		                <h1>
		                    {{ $user->display_name }}
		                </h1>
		                
		                <ul class="list-inline social">
		                    @foreach ($user->meta as $social)
		                    	@if (!starts_with($social->network, "social_"))
		                    		@continue
		                    	@endif
		                    	<li class="list-inline-item">
			                        <a href="{{ $social->url }}" class="{{ $social->icon }}"></a>
			                    </li>
		                    @endforeach
		                </ul>

		                <h3 class="user">
		                	{{ $posts->total() }} {{ strtoupper(str_plural('post', $posts->total())) }}
		                </h3>
		            </div>
		        </div>
		    </div>
		</header>
	@endif
@endsection

@section('index-filters')
	@yield('index-filter-tag')
	@yield('index-filter-user')
@endsection