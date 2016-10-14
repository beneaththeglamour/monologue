<?xml version="1.0"?>
<rss version="2.0">
	<channel>
		@if (isset($tag))
			<title>{{ $tag->name }} - {{ env('BLOG_TITLE') }}</title>
		@elseif (isset($user))
			<title>Posts by {{ $user->display_name }} - {{ env('BLOG_TITLE') }}</title>
		@elseif (isset($year))
			@if (isset($month))
				<title>Posts from {{ DateTime::createFromFormat('!m', $month)->format('F').' '.$year }} - {{ env('BLOG_TITLE') }}</title>
			@else
				<title>Posts from {{ $year }} - {{ env('BLOG_TITLE') }}</title>
			@endif
		@else
			<title>{{ env('BLOG_TITLE') }}</title>
		@endif

		<description><![CDATA[{!! env('BLOG_DESCRIPTION') !!}]]></description>
		<language>{{ env('BLOG_LANGUAGE') }}</language>
		<link>{{ env('APP_URL') }}</link>
		<generator>monologue/{{ config('app.version') }}</generator>

		@if (isset($tag))
		<category>{{ $tag->name }}</category>
		@endif

		@foreach ($posts as $post)
		<item>
			<title>{{ $post->title }}</title>
			<author>{{ $post->author->display_name }}</author>
			<link>{{ $post->permalink }}</link>
			<guid isPermaLink="true">{{ $post->permalink }}</guid>

			@foreach ($post->tags as $category)
				<category>{{ $category->name }}</category>
			@endforeach
			
			<description><![CDATA[{!! $post->summary !!}]]></description>
			<content:encoded><![CDATA[{!! $post->summary !!}]]></content:encoded>

			<pubDate>{{ $post->published_at->format('r') }}</pubDate>
			<updated>{{ $post->updated_at->format('r') }}</updated>
		</item>
		@endforeach
	</channel>
</rss>