<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    @yield('pageTitle', 'Admin') | {{config('app.name') . ' ' . trans('admin.admin')}}
</title>
<meta name="description" content="">
<meta name="author" content="Jeremy Kenedy">
<link rel="shortcut icon" href="/favicon.ico">
{{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

{{-- Fonts --}}
<!--Fonts-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
  rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

{{-- Styles --}}
<link href="{{ mix('/css/admin-mix.css') }}" rel="stylesheet">

<style type="text/css">

    @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
        .user-avatar-nav {
            background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
            background-size: auto 100%;
        }
    @endif

</style>

{{-- Scripts --}}
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    window.User = {!! json_encode(Auth::user()) !!}
</script>
<script src="{{asset('assets/theme-1/js/skins.min.js')}}"></script>

@if (Auth::User() && (Auth::User()->profile) && (isset($theme) && $theme->link!='null'))
    <link rel="stylesheet" type="text/css" href="{{ $theme->link }}">
@endif