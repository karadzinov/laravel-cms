@extends($path.'master')
@section('optionalHead')
	<style>
		.main-container{
			height: 90vh;
		}
	</style>
@endsection
@section('content')
	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">
		<input type="hidden" id="currency-symbol" value="{{ $settings->currencySymbol }}">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				@if($cart->isNotEmpty())
					<div class="main col-md-12">

						<!-- page-title start -->
						<!-- ================ -->
						<h1 class="page-title">{{trans('general.cart')}}</h1>
						<div class="separator-2"></div>
						<!-- page-title end -->

						<table class="table cart table-hover table-colored">
							<thead>
								<tr>
									<th>{{trans('general.product')}}</th>
									<th>{{trans('general.price')}}</th>
									<th>{{trans('general.quantity')}}</th>
									<th>{{trans('general.remove')}} </th>
									<th class="amount">{{trans('general.total')}}</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cart as $product)
									<tr class="remove-data cart-item">
										<td class="product"><a href="{{$product->showRoute}}">{{$product->name}}</a> <small>{{$product->short_description}}</small></td>
										<td class="price">
											<span id="product-{{$product->id}}-price">{{$product->formatedCurrentPrice}}</span>{{$settings->currencySymbol}}
										</td>
										<td class="quantity">
											<div class="form-group">
												<input data-product="{{$product->id}}" type="text" class="form-control product-quantity" value="{{$product->pivot->quantity}}">
											</div>											
										</td>
										<td class="remove">
											<a class="btn btn-remove btn-sm btn-default remove-from-cart" data-product={{$product->id}}>
												{{trans('general.remove')}}
											</a>
										</td>
										<td class="amount">
											<span class="product-times-quantity" id="product-{{$product->id}}-total">
												{{number_format($product->currentPrice * $product->pivot->quantity, 2, '.', ' ') }}
											</span>{{$settings->currencySymbol}} 
										</td>
									</tr>
								@endforeach
								<tr>
									<td class="total-quantity" colspan="4">
										{{trans('general.total')}} <span id="items-count"></span> {{trans('general.items')}}</td>
									<td class="total-amount"><span  id="total-amount"></span>{{$settings->currencySymbol}}</td>
								</tr>
							</tbody>
						</table>
						<div class="text-right">	
							<a href="{{$product->showRoute}}" class="btn btn-group btn-default">
								{{trans('general.back')}}
							</a>
							<a href="{{route('purchases.checkoutCart')}}" class="btn btn-group btn-default">
								{{trans('general.checkout')}}
							</a>
						</div>

					</div>
				@else
					<p class="lead">{{trans('general.empty-cart')}}</p>
				@endif
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection

@section('optionalScripts')
	<script>
		$(document).ready(function(){

			// function countTotal(){
			// 	let prices = $('.product-times-quantity');
			// 	let totalPrice = 0;
			// 	for(let i = 0; i< prices.length; i++){
			// 		totalPrice += cleanPrice($(prices[i]).text());
			// 	}
			// 	totalPrice= formatMoney(totalPrice.toFixed(2).toString());
			// 	$('#total-amount').text(totalPrice + '{{$settings->currencySymbol}}')

			// }

			// $('.product-quantity').on('change', function(){
				
			// 	changeQuantity($(this));
			// });

			// function changeQuantity(obj){
			// 	const productId = obj.data('product');
			// 	let quantity = obj.val();
			// 	$.ajaxSetup({
   // 				    headers:
  	// 				    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			// 	});
			// 	$.ajax({
			// 		type: 'POST',
			// 		url: '{{route('cart.changeQuantity')}}',
			// 		data:{
			// 			product_id: productId,
			// 			quantity: quantity,
			// 		},
			// 		success: function (response){
			// 			if(response.status === "success"){

			// 				flashMessage('success', response.message);
			// 			}else if(response.status === "warning"){
							
			// 				flashMessage('warning', response.message);
			// 				obj.val(response.quantity)
			// 				quantity = response.quantity;
			// 			}
						
			// 			//update price
			// 			const currnetPrice = $('#product-'+productId+'-price').text();
			// 			let totalPriceForProduct = $('#product-'+productId+'-total');
			// 			totalPriceForProduct.html(formatMoney((cleanPrice(currnetPrice)*cleanPrice(quantity)).toFixed(2)));
						
			// 			countTotal();
			// 		},
			// 		error: function(error){
			// 			flashMessage('danger', error.message);
			// 		}

			// 	});
			// }

			// $('.remove-from-cart').on('click', function(){
			// 	const product = $(this).data('product');

			// 	$.ajaxSetup({
			// 		headers:
  	// 				    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			// 	});
			// 	$.ajax({
			// 		type: 'DELETE',
			// 		url: '{{route('cart.deleteFromCart')}}',
			// 		data:{
			// 			product_id: product
			// 		},
			// 		success: function(response){
			// 			flashMessage('success', response.message);
			// 			countTotal();
			// 			removeFromNavCart(product);
			// 		},
			// 		error: function(error){
			// 			flashMessage('danger', response.message);
			// 		}
			// 	});
			// });

			// function removeFromNavCart(id){
			// 	const x = $('*[data-nav-cart-product="' + id + '"]');

			// 	$(x).remove();
			// 	countNavCartItems();
			// 	navCartTotal();
			// }

			// countTotal();
			// countCartItems();
		});
	</script>
@endsection