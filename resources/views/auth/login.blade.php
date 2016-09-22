@extends('layouts.app')

@section('content')
<div class="container auth">
    <div class="col-md-6 col-md-offset-3">
        <div class="auth-title">
            <span>Sign in</span>
            
            @if (starts_with(Request::url(), 'https')) 
            <div class="auth-subtitle">
                <span class="icon-locked icon-medium"></span> Your connection is secure.
            </div>
            @endif
        </div>
        
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label auth-control">Email address</label>

                <div class="col-md-8">
                    <input type="email" class="form-control auth-control" name="email" value="{{ old('email') }}">
                    
                    @if ($errors->has('email'))
                        <small class="help-block">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label auth-control">Password</label>

                <div class="col-md-8">
                    <input type="password" class="form-control auth-control" name="password">
                    
                    @if ($errors->has('password'))
                        <small class="help-block">
                            {{ $errors->first('password') }}
                        </small>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <div class="pull-left">
                        <div class="checkbox auth-checkbox">
                            <label>
                                <input type="checkbox" name="remember"> <span>Remember me</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="pull-right">
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
