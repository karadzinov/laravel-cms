<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->

	<head>
		@include('google/google-analytics')
		@include($path . 'partials/head')
		@yield('optionalHead')

		<style>
			.flash-alerts{
				position: absolute;
				right: 0;
				max-width: 300px;
				z-index: 100;
				bottom: 100px;
			}
			.my-alert{
				margin:0;
			}
			.page-wrapper{
				min-height: 100vh;
			}
		</style>
	</head>

	<!-- body classes:  -->
	<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
	<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
	<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
	<!-- "gradient-background-header": applies gradient background to header -->
	<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
	<body class="no-trans front-page transparent-header  ">

		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		
		<div class="page-wrapper">
			<div class="header-container">
				@include($path . 'partials/header')
				@include($path . 'partials/nav')
			</div>
			@include($path . 'partials/flash-messages')
			@yield('content')
		</div>
		
		@include($path . 'partials/footer')
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
