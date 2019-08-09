<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->

	<head>
		@include('partials/user/head')
		@yield('optionalHead')
		<style>
			#homepage-about-tabs .tab-content iframe, 
			#homepage-about-tabs #messages, #offer{
				height: 266px;
			}
			#homepage-about-tabs .tab-content img{
				height: 266px;
				object-fit: cover;
				width: 100%;
			}
			#offer{
				display: flex;
				flex-direction: column;
				justify-content: space-between;
			}
			.post-exemple-item{
				height: 220px;
				width: 100%;
				object-fit: cover;
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
				@include('partials/user/header')
				@include('partials/user/nav')
			</div>

			@yield('content')
		</div>
		
		@include('partials/user/footer')
		@include('partials/user/scripts')
		@foreach($scripts as $script)
			{!!$script ->code!!}
		@endforeach
		@yield('optionalScripts')
	</body>
</html>
