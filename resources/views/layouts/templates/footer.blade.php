<?php

	// Random quotes shown in the footer title.
	$quotes = [
		['This is a quote that will appear in the footer.', 'Some guy']
	];

	$random_quote = $quotes[array_rand($quotes)];

?>

@section('footer')
	<footer>
		<div class="container">
			<div class="row">
				<section class="col-lg-3 links">
					<div><a href="#">syndication</a></div>
					<div><a href="#">projects</a></div>
					<div><a href="#">contact</a></div>
					<div><a href="#">log in</a></div>
				</section>

				<section class="col-lg-9 body">
					<div class="title">
						&ldquo;{{ $random_quote[0] }}&rdquo;
						
						<small class="author">
							&mdash; {{ $random_quote[1] }}
						</small>
					</div>

					<p class="about">
						Here's some information about the blog. Well, not really. You have to add some stuff here yourself.
					</p>

					<p class="copyright">
						&copy; {{ date("Y") }}, {{ env('BLOG_TITLE') }} &mdash; <a href="https://github.com/aixxe/monologue">powered by monologue</a>
					</p>

					<p class="social">
						<a target="_blank" title="Twitter" href="#">
							<span class="icon-twitter-square"></span>
						</a>

						<a target="_blank" title="GitHub" href="#">
							<span class="icon-github-square"></span>
						</a>
						
						<a target="_blank" title="Steam" href="#">
							<span class="icon-steam-square"></span>
						</a>
					</p>
				</section>
			</div>
		</div>
	</footer>
@endsection