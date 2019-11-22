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
			.wishlist-button{
				margin-left: 20px;
				cursor: pointer;
			}
			.in-wishlist{
				color: #F35442
			}
			.mb-3{
				margin-bottom: 30px;
			}

			.product-thumbnail{
				height: 206px;
				width: 100%;
				object-fit: cover;

			}
			.searchResultsTitle{
				background: rgba(9,174,222, 0.5);
				margin-top:0;
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
			function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = " ") {
			  try {
			    decimalCount = Math.abs(decimalCount);
			    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

			    const negativeSign = amount < 0 ? "-" : "";

			    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
			    let j = (i.length > 3) ? i.length % 3 : 0;

			    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
			  } catch (e) {
			    console.log(e)
			  }
			};

			function cleanPrice(price){

				return Number(price.replace(' ', '').replace(',',''))
			}

			function countCartItems(){
				const items = $('.cart-item').length;
				$('#items-count').text(items);
			}

			
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
				   	 	}else if(response.status==='new'){
				   	 		$('#cart-placeholder').replaceWith(response.view);
				   	 		flashMessage("success", response.message);
				   	 		
				   	 		return;
				   	 	}
				   	 	$('.quick-cart-wrapper').prepend(response.view);
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

				setTimeout(function(){
					$('.my-alert').fadeOut('slow');
				}, 4000);
			});
		</script>
		@yield('optionalScripts')
		
	</body>
</html>
