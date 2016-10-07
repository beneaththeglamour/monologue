@section('index-filter-generic')
	@if (array_key_exists('tag', $filter))
		<header class="showcase showcase-index" style="background-image: url('{{ $filter['tag']->bannerUrl }}');">
		    <div class="overlay">
		        <div class="container">
		            <div class="postinfo text-xs-center">
		                <h1>{{ $filter['tag']->name }}</h1>
		                <h2>{{ $filter['tag']->description }}</h2>
		            </div>
		        </div>
		    </div>
		</header>
	@endif
@endsection

@section('index-filter-user')
	@if (array_key_exists('user', $filter))
		<header class="showcase showcase-index showcase-index-user" style="background-image: url('{{ $filter['user']->bannerUrl }}');">
		    <div class="overlay">
		        <div class="container">
		            <div class="postinfo text-xs-center">
	            	    <div class="avatar">
		                    <img class="img-circle" src="{{ $filter['user']->avatarUrl }}">
		                </div>
	                
		                <h1>
		                    {{ $filter['user']->display_name }}
		                </h1>
		                
		                <ul class="list-inline social">
		                    @foreach ($filter['user']->meta as $social)
		                    	@if (!starts_with($social->network, "social_"))
		                    		@continue
		                    	@endif
		                    	<li class="list-inline-item">
    		                        <a href="{{ $social->url }}" class="{{ $social->icon }}"></a>
    		                    </li>
		                    @endforeach
		                </ul>
		            </div>
		        </div>
		    </div>
		</header>
	@endif
@endsection