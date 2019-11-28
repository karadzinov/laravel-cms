<!DOCTYPE html>

<html lang="en">
	
	<head>
		@include('google/google-analytics')
		@include($path . 'partials/head')
		@yield('optionalHead')
		<link rel="stylesheet" href="{{asset('assets/theme-2/css/layout-shop.css')}}">
		<style>
			#content{
				min-height: 100vh
			}
			.in-wishlist{
				color: #DC3545
			}
			.mt-100{
				margin-top: 100px !important;
			}
			.half-width{
				max-width: 50%;
			}
			#mainSearchResponse{
				z-index: 1;
				width: 100%;
			}
		</style>
	</head>
	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets/images/_smarty/boxed_background/1.jpg"
	-->
	<body class="smoothscroll enable-animation grain-grey">
		
		@include($path . 'partials/header')

		<!-- wrapper -->
		<div id="wrapper">
			<div id="content">
				@include($path . 'partials/nav')
				@include($path . 'partials/flash-messages')

				@yield('content')
			</div>
			
			@include($path . 'partials/footer')
		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="javascript:void(0)" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->
		
		@include($path . 'partials/scripts')
		@foreach($scripts as $script)
			{!!$script ->code!!}
		@endforeach
		@yield('optionalScripts')
	</body>
</html>