@extends('layouts.app')

@section('content')
<div class="container auth controls">
    <div class="col-lg-8 offset-lg-2">
        <div class="title">
            <span>Sign in</span>
            
            @if (starts_with(Request::url(), 'https')) 
            <div class="subtitle">
                <span class="icon-locked icon-medium"></span> Your connection is secure.
            </div>
            @endif
        </div>
        
        <form role="form" method="POST" action="{{ action('Auth\LoginController@login') }}">
            {!! csrf_field() !!}
            
            <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                <label class="col-lg-3 control col-form-label">Email address</label>

                <div class="col-lg-9">
                    <input type="email" class="form-control control" name="email" value="{{ old('email') }}">
                    
                    @if ($errors->has('email'))
                        <small class="form-control-feedback">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>
            </div>

            <div class="form-group row{{ $errors->has('password') ? ' has-danger' : '' }}">
                <label class="col-lg-3 control">Password</label>

                <div class="col-lg-9">
                    <input type="password" class="form-control control" name="password">
                    
                    @if ($errors->has('password'))
                        <small class="form-control-feedback">
                            {{ $errors->first('password') }}
                        </small>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="pull-xs-left">
                        <div class="form-check checkbox">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remember"> Remember me
                            </label>
                        </div>
                    </div>
                    
                    <div class="pull-xs-right">
                        <button type="submit" class="btn">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
