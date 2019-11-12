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

		<script>
			$(document).ready(function(){
				
				$('.add-to-cart').on('click', function(){
					const product_id = $(this).data('product');
					let element = $(this);

					 $.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				        }
				    });
					$.ajax({

					   type:'POST',
					   url:'{{route('cart.addToCart')}}',
					   data:{
					   		product_id
					   },
					   success:function(response){
					   	
					   	if(response.status === "already-added"){
					   		flashMessage("success", response.message);
					   		return;
					   	}
					   	
					   	flashMessage("success", response.message);
					   	element.html("{{trans('general.added-to-cart')}} <i class='fa fa-check'></i>");
					   },
					   error:function(response){
					   	
					   		flashMessage("danger", response.message);
					   }

					});
				});

				$(document).on('click', '.add-to-wishlist', function(){
					const product = $(this).data('product');
					const button = $(this);
					$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				        }
				    });
					$.ajax({

					   type:'POST',
					   url:'{{route('wishlist.add')}}',
					   data:{
					   		product_id: product
					   },
					   success:function(response){
					   	
					   	if(response.status === "already-added"){
					   		flashMessage("success", response.message);
					   		return;
					   	}
					   	
					   	flashMessage("success", response.message);
					   	button.toggleClass('add-to-wishlist remove-from-wishlist');
					   	button.html("<i class='fa fa-heart in-wishlist'></i>");
					   	button.prop('title', "{{trans('general.remove-from-wishlist')}}");
					   },
					   error:function(response){
					   		flashMessage("danger", response.message);
					   }

					});
				});

				$(document).on('click', '.remove-from-wishlist', function(){
					const product = $(this).data('product');
					const button = $(this);
					$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				        }
				    });
					$.ajax({

					   	type:'POST',
					   	url:'{{route('wishlist.remove')}}',
					   	data:{
					   		product_id: product
					   	},
					   	success:function(response){
					   		flashMessage("success", response.message);
						   	button.toggleClass('add-to-wishlist remove-from-wishlist');
					   		button.html("<i class='fa fa-heart-o'></i>");
					   		button.prop('title', "{{trans('general.add-to-wishlist')}}");

					   	},
					   	error:function(response){
					   		flashMessage("danger", response.message);
					   }

					});
				});
				
				setTimeout(function(){
					$('.my-alert').fadeOut('slow');
				}, 4000);
			});
		</script>
	</body>
</html>