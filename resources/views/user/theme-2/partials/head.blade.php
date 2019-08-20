<meta charset="utf-8" />
<title>
	@yield('title', $settings->title) | {{config('app.name')}}
</title>
<meta name="description" content="" />
{{-- <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" /> --}}

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<meta property="fb:app_id" content="XXX">
<meta name="description" content="{{$settings->meta_description}}">
<meta name="keywords" content="XXX">
<!-- Open Graph Tags -->
<meta property="og:title" content="{{$settings->meta_title}}">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:image" content="{{asset('images/settings/medium/'. $settings->logo)}}">
<meta property="og:site_name" content="{{config('app.name')}}">
<meta property="og:description" content="{{$settings->description}}">
<meta property="og:type" content="website">
<!-- Twitter Card Tags -->
<meta name="twitter:card" content="{{asset('images/settings/medium/'. $settings->logo)}}">
<meta name="twitter:title" content="{{$settings->title}}">
<meta name="twitter:description" content="{{$settings->description}}">
<meta name="twitter:image:src" content="{{asset('images/settings/medium/'. $settings->logo)}}">
<meta name="twitter:domain" content="{{url()->current()}}">
<meta name="_token" content="{{csrf_token()}}" />

<!-- WEB FONTS : use %7C instead of | (pipe) -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

<!-- CORE CSS -->
<link href="{{asset('assets/theme-2/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('images/settings/medium/'. $settings->logo)}}">

<!-- REVOLUTION SLIDER -->
<link href="{{asset('assets/theme-2/plugins/slider.revolution/css/extralayers.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/theme-2/plugins/slider.revolution/css/settings.css')}}" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<link href="{{asset('assets/theme-2/css/essentials.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/theme-2/css/layout.css')}}" rel="stylesheet" type="text/css" />

<!-- PAGE LEVEL SCRIPTS -->
<link href="{{asset('assets/theme-2/css/header-1.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/theme-2/css/color_scheme/green.css')}}" rel="stylesheet" type="text/css" id="color_scheme" />