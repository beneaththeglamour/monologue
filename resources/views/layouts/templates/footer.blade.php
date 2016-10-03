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
						designed &amp; developed by aixxe
					</div>

					<p class="about">
						My blog where I publish a variety of interesting things, mostly related to development and technology with some guest appearences by friends.
					</p>

					<p class="copyright">
						&copy; {{ date("Y") }}, aixxe.net &mdash; <a href="https://github.com/aixxe/monologue">powered by monologue</a>
					</p>

					<p class="social">
						<a target="_blank" title="Twitter" href="https://twitter.com/a1xxe">
							<span class="icon-twitter-square"></span>
						</a>

						<a target="_blank" title="GitHub" href="https://github.com/aixxe">
							<span class="icon-github-square"></span>
						</a>
						
						<a target="_blank" title="Steam" href="https://steamcommunity.com/id/aixxe">
							<span class="icon-steam-square"></span>
						</a>
					</p>
				</section>
			</div>
		</div>
	</footer>
@endsection