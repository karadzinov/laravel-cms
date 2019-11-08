<!DOCTYPE html>

<html lang="en">
	
	<head>
		@include('google/google-analytics')
		@include($path . 'partials/head')
		@yield('optionalHead')
		<style>
			.social-whatsapp:hover { background-color: #00E676 !important; }
			.social-whatsapp { background-color: #3B5998; }
			.my-alert{
				position: absolute;
				z-index: 1001
			}
			body.grain-grey #header li.quick-cart .quick-cart-box{
				background: #f1f2f7
			}
			#header.translucent li.quick-cart .quick-cart-box:hover{
				background: #f1f2f7
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
			@include($path . 'partials/nav')
			@include($path . 'partials/flash-messages')

			@yield('content')
			
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

		<script>
			function flashMessage(type="warning", message){

				message = `
				<div class="alert alert-${type} flash-alerts" role="alert">
					${message}
				</div>`;
				$('body').prepend(message);
				setTimeout(function(){ $('.flash-alerts').fadeOut('slow'); }, 3000);
			}
		</script>

		@yield('optionalScripts')
	</body>
</html>