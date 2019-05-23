@extends('layouts.auth-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-6 col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption">Basic Form</span>
                </div>
                <div class="widget-body">
                    <div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('Username') }}</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="first_name">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            @if(config('settings.reCaptchStatus'))
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-4">
                                        <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}"></div>
                                    </div>
                                </div>
                            @endif
                            
                            <button type="submit" class="btn btn-blue">{{ __('Register') }}</button>
                            <div class="row">
                                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 text-center">
                                    <p class="text-center mb-4">
                                        Or Use Social Logins to Register
                                    </p>
                                    @include('partials.socials')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
    @if(config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
@endsection
