<!-- JAVASCRIPT FILES -->
<script>var plugin_path = '{{asset('assets/theme-2/plugins/')}}/';</script>

<script src="{{mix('js/theme-2-mix.js')}}"></script>
<script src="{{ asset('assets/common/js/lazyload/dist/lazyload.min.js') }}"></script>
<script>
	var lazyLoadInstance = new LazyLoad({
	    elements_selector: ".lazy"
	    // ... more custom settings?
	});
</script>
<script src="{{asset('assets/theme-2/js/custom.js')}}"></script>

@if(config('settings.googleMapsAPIStatus'))
	<script src="//maps.googleapis.com/maps/api/js?key={{config("settings.googleMapsAPIKey")}}&libraries=places&dummy=.js"></script>
@endif
<script>
	if($('#map-canvas').length){
		let lat = parseFloat($('#lat').val());
		let lng = parseFloat($('#lng').val());
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			    center: {lat: lat, lng: lng },
			    zoom: 10
			});
		var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng },
            map: map,
            draggable: false
        });
	}

	$(document).ready(function(){

		function countNavCartItems(){
			const items = $('.nav-cart-item').length;
			$('.nav-cart-count').text(items);
		}
		function navCartTotal(){
			const products = $('.nav-cart-price');
			let total = 0;
			for(let i = 0; i<products.length; i++){
				total += cleanPrice($(products[i]).text());
			}

			$('#nav-cart-total').text(formatMoney(total));
		}

		countNavCartItems();
		navCartTotal();

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
		
		function countTotal(){
			let prices = $('.product-times-quantity');
			let totalPrice = 0;
			const currency = $('#currency-symbol').val()
			for(let i = 0; i< prices.length; i++){
				totalPrice += cleanPrice($(prices[i]).text());
			}
			totalPrice= formatMoney(totalPrice.toFixed(2).toString());
			$('#total-amount').text(totalPrice + currency)

		}

		$('.product-quantity').on('change', function(){
			
			changeQuantity($(this));
		});

		function changeQuantity(obj){
			const productId = obj.data('product');
			let quantity = obj.val();
			$.ajaxSetup({
				    headers:
					    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			});
			$.ajax({
				type: 'POST',
				url: '{{route('cart.changeQuantity')}}',
				data:{
					product_id: productId,
					quantity: quantity,
				},
				success: function (response){
					if(response.status === "success"){

						flashMessage('success', response.message);
					}else if(response.status === "warning"){
						
						flashMessage('warning', response.message);
						obj.val(response.quantity)
						quantity = response.quantity;
					}
					
					//update price
					const currnetPrice = $('#product-'+productId+'-price').text();
					let totalPriceForProduct = $('#product-'+productId+'-total');
					totalPriceForProduct.html(formatMoney((cleanPrice(currnetPrice)*cleanPrice(quantity)).toFixed(2)));
					
					countTotal();
				},
				error: function(error){
					flashMessage('danger', error.message);
				}

			});
		}

		if($('.product-times-quantity')){
			countTotal();
		}
		if( $('.cart-item').length){
			countCartItems();
		}

		$('.remove-from-cart').on('click', function(){
			const product = $(this).data('product');
			var remove = $(this).parent().closest('tr');
			$.ajaxSetup({
				headers:
					    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			});
			$.ajax({
				type: 'DELETE',
				url: '{{route('cart.deleteFromCart')}}',
				data:{
					product_id: product
				},
				success: function(response){
					flashMessage('success', response.message);
					remove.remove();
					countTotal();
					countTotal();
					removeFromNavCart(product);
				},
				error: function(error){
					flashMessage('danger', response.message);
				}
			});
		});

		function removeFromNavCart(id){
			const x = $('*[data-nav-cart-product="' + id + '"]');

			$(x).remove();
			countNavCartItems();
					navCartTotal();
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
				   		countNavCartItems();
				   	 	navCartTotal();

				   		return;
				   	}
				   	$('.quick-cart-wrapper').prepend(response.view);
				   	flashMessage("success", response.message);
				   	element.html("{{trans('general.added-to-cart')}} <i class='fa fa-check'></i>");
				   	countNavCartItems();
				   	navCartTotal();
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
})
</script>
