<?php

	$nav_items = [
		['title' => 'Blog', 'name' => 'blog', 'action' => 'BlogController@index'],
		['title' => 'Contact', 'name' => 'contact', 'action' => 'ContactController@showContactForm']
	];

	$current_route = Route::getCurrentRoute()->getName();

?>

@section('navbar')
	<ul class="list-inline">
		@foreach ($nav_items as $item)
			<li class="list-inline-item">
				<a href="{{ action($item['action']) }}" class="item{{ ($current_route == $item['name']) ? ' item-active': '' }}" title="{{ $item['title'] }}">
					<span>{{ $item['title'] }}</span>
				</a>
			</li>
		@endforeach
	</ul>
@endsection