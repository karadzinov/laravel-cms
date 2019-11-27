<meta charset="utf-8" />
<title>
	@yield('title', $metadata->title ?? $settings->title) | {{$settings->title}}
</title>
{{-- <meta name="author" content="Sentice" /> --}}

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<meta property="fb:app_id" content="XXX">
<meta name="description" content="{{$metadata->description ?? $settings->meta_description}}">
<meta name="keywords" content="XXX">
<!-- Open Graph Tags -->
<meta property="og:title" content="{{$metadata->title ?? $settings->title}}">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:image" content="{{$metadata->image ?? asset('images/settings/medium/'. $settings->logo)}}">
<meta property="og:site_name" content="{{$settings->title}}">
<meta property="og:description" content="{{$metadata->description ?? $settings->description}}">
<meta property="og:type" content="website">
<!-- Twitter Card Tags -->
<meta name="twitter:card" content="{{$metadata->image ?? asset('images/settings/medium/'. $settings->logo)}}">
<meta name="twitter:title" content="{{$metadata->title ?? $settings->title}}">
<meta name="twitter:description" content="{{$metadata->description ?? $metadata->description ?? $settings->description}}">
<meta name="twitter:image:src" content="{{$metadata->image ?? asset('images/settings/medium/'. $settings->logo)}}">
<meta name="twitter:domain" content="{{url()->current()}}">
<meta name="_token" content="{{csrf_token()}}" />

<!-- WEB FONTS : use %7C instead of | (pipe) -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('images/settings/thumbnails/'. $settings->logo)}}">

<!-- Mix -->
<link rel="stylesheet" href="{{mix('css/theme-2-mix.css')}}">