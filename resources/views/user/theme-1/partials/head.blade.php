<meta charset="utf-8">
<meta name="author" content="htmlcoder.me">

<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
	@yield('title', $metadata->title ?? $settings->title) | {{config('app.name')}}
</title>

<meta property="fb:app_id" content="XXX">
<meta name="description" content="{{$metadata->description ?? $settings->meta_description}}">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
<meta name="twitter:description" content="{{$metadata->description ?? $settings->description}}">
<meta name="twitter:image:src" content="{{$metadata->image ?? asset('images/settings/medium/'. $settings->logo)}}">
<meta name="twitter:domain" content="{{url()->current()}}">
<meta name="_token" content="{{csrf_token()}}" />

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('images/settings/medium/'. $settings->logo)}}">
<!-- Web Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>


<!-- The Project's Typography CSS file, includes used fonts -->
<!-- Used font for body: Roboto -->
<!-- Used font for headings: Raleway - asssets/css/typography-default.css-->
<!-- Custom css - assets/css/custom.css--> 
<link rel="stylesheet" href="{{mix('css/theme-1-mix.css')}}">

<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
{{-- <link href="{{asset('assets/theme-1/css/skins/light_blue.css')}}" rel="stylesheet"> --}}


