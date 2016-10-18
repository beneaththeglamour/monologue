@extends('layouts.app')

@section('content')
<div class="container contact controls">
	<div class="col-lg-8 offset-lg-2">
		<div>
			@if (Session::has('success'))
				<div class="alert alert-success">
					<span class="icon-tick"></span> Message sent successfully!
				</div>
			@endif

			<div class="title">
				Get in touch.
			</div>
			
			<div class="subtitle">
				Leave a message and I’ll get back to you as soon as possible.
			</div>

			<div class="social">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a target="_blank" href="#">
							<span class="icon-twitter" aria-hidden="true"></span>
						</a>
					</li>

					<li class="list-inline-item">
						<a target="_blank" href="#">
							<span class="icon-github" aria-hidden="true"></span>
						</a>
					</li>

					<li class="list-inline-item">
						<a target="_blank" href="#">
							<span class="icon-steam" aria-hidden="true"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<form method="POST" action="{{ action('ContactController@sendMessage') }}">
			{!! csrf_field() !!}
			
			<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
				<input type="text" class="form-control control" name="name" placeholder="Your name" value="{{ old('name') }}" required>

				@if ($errors->has('name'))
					<small class="form-control-feedback text-xs-left">
						{{ $errors->first('name') }}
					</small>
				@endif
			</div>

			<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
				<input type="email" class="form-control control" name="email" placeholder="Your email address" value="{{ old('email') }}" required>

				@if ($errors->has('email'))
					<small class="form-control-feedback text-xs-left">
						{{ $errors->first('email') }}
					</small>
				@endif
			</div>

			<div class="form-group{{ $errors->has('message') ? ' has-danger' : '' }}">
				<textarea name="message" class="form-control control" rows="8" required></textarea>

				@if ($errors->has('message'))
					<small class="form-control-feedback text-xs-left">
						{{ $errors->first('message') }}
					</small>
				@endif
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Send</button>
			</div>
		</form>

		<hr>

		<footer>
			<div class="pull-xs-left">
				Some footer text.
			</div>

			<div class="pull-xs-right">
				Some more text.
			</div>
		</footer>
	</div>
</div>
@endsection