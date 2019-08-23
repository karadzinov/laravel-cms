<!DOCTYPE html>

<html lang="en">
	
	<head>
		@include($path . 'partials/head')
		<style>
			.social-icon .fa{
				font-size: 24px
			}
			.social-icon .fa-instagram{
				margin-right: 2px !important
			}
			.uppercase{
				text-transform: uppercase;
			}

			.language-switcher form, .language-switcher li, .language-switcher ul .language-switcher input{
				margin: 0 !important;
				padding: 0 !important;
			}
			.language-switcher .btn{
				border-radius: 0;
			}
			.dropdown-toggle::after{
				display:none;
			}
			.language-switcher ul.dropdown-menu{
				border: 0px !important;
			}
			#searchResponse{
				width: 100%;
			}

			#searchResponse .searchResultsTitle{
				background-color: #8AB933;
				color: white;
			}

			#sidebarSearchResults{
				width: 90%;
				position: absolute;
				background: white;
				z-index: 100;
				margin-top: -30px;
			}
			.homepageCategories img{
				margin-right: 20px;
				width: 100%;
				object-fit: cover
			}
		</style>
		@yield('optionalHead')
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

			@yield('content')
			
			@include($path . 'partials/footer')
		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


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