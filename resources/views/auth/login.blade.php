@extends('layouts.auth-layout')

@section('content')
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">{{trans('admin.login')}}</div>
            <div class="loginbox-social">
                <div class="social-title ">{{trans('auth.socialite-login')}}</div>
                <div class="social-buttons">
                    @include('admin/partials/socials-icons')
                </div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">{{trans('general.or')}}</div>
            </div>
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="loginbox-textbox">
                    <label for="email">{{ trans('general.email') }}</label>
                     <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{trans('general.email')}}" required autofocus>
                     @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="loginbox-textbox">
                    <label for="exampleInputPassword1">{{ trans('general.password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="loginbox-textbox">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="text">{{ trans('auth.remember-me') }}</span>
                        </label>
                    </div>
                </div>
                <div class="loginbox-forgot">
                    <a href="{{ route('password.request') }}">{{ trans('auth.forgot-password') }}</a>
                </div>
                <div class="loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="{{ trans('admin.login') }}">
                </div>
            </form>
        </div>
        <div class="bottom">
            @php
                $languages = App\Models\Language::where('active', '=', 1)->get();
            @endphp
            @if($languages->count() > 1)
                <p class="text-center">{{trans('general.navigation.change_language')}}</p>
                <form class="text-center" method="POST" action="{{route('switchLanguage')}}">
                    @foreach($languages as $language)
                        @csrf
                        <input type="submit" name="language" class="btn btn-default @if(App::getLocale() === $language->code) active @endif" value="{{$language->native}}">
                    @endforeach
                </form>
            @endif
            
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>
@endsection