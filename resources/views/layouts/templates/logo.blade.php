{{-- reaaaaally don't like this. --}}
@section('logo')
	<div class="logo" style="background-image: url('{{ elixir('img/logo.png', 'monologue') }}'); background: url('{{ elixir('img/logo.svg', 'monologue') }}'), linear-gradient(transparent, transparent);">
	    <a href="{{ action('BlogController@index') }}"></a>
	</div>
@endsection

@section('logo-alt')
	<div class="logo" style="background-image: url('{{ elixir('img/logo-alt.png', 'monologue') }}'); background: url('{{ elixir('img/logo-alt.svg', 'monologue') }}'), linear-gradient(transparent, transparent);">
	    <a href="{{ action('BlogController@index') }}"></a>
	</div>
@endsection