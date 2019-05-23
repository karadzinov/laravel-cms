@extends('layouts.auth-layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-6 col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption">{{ __('Login') }}</span>
                </div>
                <div class="widget-body">
                    <div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                 <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="text">{{ __('Remember Me') }}</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-blue">{{ __('Login') }}</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>

                             <p class="text-center mb-3">
                                Or Login with
                            </p>

                            @include('partials.socials-icons')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
