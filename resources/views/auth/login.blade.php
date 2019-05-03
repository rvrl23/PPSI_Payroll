@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login shadow">
        <div class="login-item1 xx-large white belizeholebg">

            <div class="login100-form-title" style="background-image: url(/img/login-cover.png);">
                <span class="login100-form-title-1">
                    Sign In
                </span>
            </div>
        </div>

        <div class="login-item2 whitebg">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div id="email" class="input whitebg login-input-icon"> <span class="glyphicon glyphicon-envelope belizehole"></span><input class="login-input login-input-icon {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus type="text" placeholder="Email"></div>


                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <div id="password" class="input whitebg login-input-icon"> <span class="glyphicon glyphicon-lock belizehole"></span><input class="login-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required type="password" placeholder="Password"> </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="login-button-panel clearfix">
                        <div class="col-xs-6">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            &nbsp; &nbsp;
                            <label class="form-check-label" for="remember">
                                <p class="small">{{ __('Remember Me') }}</p>
                            </label>
                        </div>

                        <div class="col-xs-6 right">
                         @if (Route::has('password.request'))
                            <a class="btn btn-link small" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <br><br><br>
                        <button type="submit" class="btn btn-primary medium">
                            {{ __('Login') }}
                        </button>
                        </div>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
