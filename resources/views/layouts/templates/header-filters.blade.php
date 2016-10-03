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
		                    <li class="list-inline-item">
		                        <a href="#" class="icon-globe"></a>
		                    </li>

		                    <li class="list-inline-item">
		                        <a href="#" class="icon-twitter"></a>
		                    </li>

		                    <li class="list-inline-item">
		                        <a href="#" class="icon-github"></a>
		                    </li>

		                    <li class="list-inline-item">
		                        <a href="#" class="icon-steam"></a>
		                    </li>

		                    <li class="list-inline-item">
		                        <a href="#" class="icon-skype"></a>
		                    </li>
		                </ul>
		            </div>
		        </div>
		    </div>
		</header>
	@endif
@endsection