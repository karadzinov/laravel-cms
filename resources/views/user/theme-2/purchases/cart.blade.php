@extends($path.'master')
@section('optionalHead')
	<style>
		.main-container{
			height: 90vh;
		}
	</style>
@endsection
@section('content')
	
	<!-- CART -->
	{{-- <section>
		<div class="container">

		
			<!-- EMPTY CART -->
			<div class="card card-default">
				<div class="card-block">
					<strong>Shopping cart is empty!</strong><br />
					You have no items in your shopping cart.<br />
					Click <a href="index.html">here</a> to continue shopping. <br />
					<span class="badge badge-warning">this is just an empty cart example</span>
				</div>
			</div>
			<!-- /EMPTY CART -->



			<!-- CART -->
			<div class="row">

				<!-- LEFT -->
				<div class="col-lg-9 col-sm-8">

					<!-- CART -->
					<form class="cartContent clearfix" method="post" action="#">

						<!-- cart content -->
						<div id="cartContent">
							<!-- cart header -->
							<div class="item head clearfix">
								<span class="cart_img"></span>
								<span class="product_name fs-13 bold">PRODUCT NAME</span>
								<span class="remove_item fs-13 bold"></span>
								<span class="total_price fs-13 bold">TOTAL</span>
								<span class="qty fs-13 bold">QUANTITY</span>
							</div>
							<!-- /cart header -->

							@foreach($cart as $product)
								<!-- cart item -->
								<div class="item">
									<div class="cart_img float-left fw-100 p-10 text-left"><img src="{{$product->thumbnailPath.$product->main_image}}" alt="" width="80" /></div>
									<a href="shop-single-left.html" class="product_name">
										<span>{{$product->name}}</span>
										<small>{{$product->short_description}}</small>
									</a>
									<a href="#" class="remove_item"><i class="fa fa-times"></i></a>
									<div class="total_price"><span>{{$product->pivot->quantity * $product->currentPrice . $currency}}</span></div>
									<div class="qty"><input type="number" value="{{$product->pivot->quantity}}" name="qty" maxlength="3" max="999" min="1" /> &times; {{$product->currentPrice.$currency}}</div>
									<div class="clearfix"></div>
								</div>
								<!-- /cart item -->
							@endforeach

							<!-- update cart -->
							<button class="btn btn-success mt-20 mr-10 float-right"><i class="glyphicon glyphicon-ok"></i> UPDATE CART</button>
							<button class="btn btn-danger mt-20 mr-10 float-right"><i class="fa fa-remove"></i> CLEAR CART</button>
							<!-- /update cart -->

							<div class="clearfix"></div>
						</div>
						<!-- /cart content -->

					</form>
					<!-- /CART -->

				</div>


				<!-- RIGHT -->
				<div class="col-lg-3 col-sm-4">

					<!-- TOGGLE -->
					<div class="toggle-transparent toggle-bordered-full clearfix">

						<div class="toggle mt-0">
							<label>Voucher</label>

							<div class="toggle-content">
								<p>Enter your discount coupon code.</p>

								<form action="#" method="post" class="m-0">
									<input type="text" id="cart-code" name="cart-code" class="form-control text-center mb-10" placeholder="Voucher Code" required="required">
									<button class="btn btn-primary btn-block" type="submit">SUBMIT</button>
								</form>
							</div>
						</div>

						<div class="toggle">
							<label>Shipping tax calculator</label>

							<div class="toggle-content">
								<p>To get a shipping estimate, please enter your destination.</p>

								<form action="#" method="post" class="m-0">
									<label>Country*</label>
									<select id="cart-tax-country" name="cart-tax-country" class="form-control pointer mb-20">
										<option value="1">United States</option>
										<option value="2">United Kingdom</option>
										<option value="2">...........</option>
										<!-- add all here -->
									</select>

									<label>State/Province</label>
									<select id="cart-tax-state" name="cart-tax-state" class="form-control pointer mb-20">
										<option value="1">Alabama</option>
										<option value="2">Alaska</option>
										<option value="2">...........</option>
										<!-- add all here -->
									</select>

									<label>Zip/Postal Code</label>
									<input type="text" id="cart-tax-postal" name="cart-tax-postal" class="form-control mb-20">

									<button class="btn btn-primary btn-block" type="submit">SUBMIT</button>
								</form>
							</div>
						</div>

					</div>
					<!-- /TOGGLE -->
					
					<div class="toggle-transparent toggle-bordered-full clearfix">
						<div class="toggle active">
							<div class="toggle-content">
								
								<span class="clearfix">
									<span class="float-right">$120.75</span>
									<strong class="float-left">Subtotal:</strong>
								</span>
								<span class="clearfix">
									<span class="float-right">$0.00</span>
									<span class="float-left">Discount:</span>
								</span>
								<span class="clearfix">
									<span class="float-right">$0.00</span>
									<span class="float-left">Shipping:</span>
								</span>

								<hr />

								<span class="clearfix">
									<span class="float-right fs-20">$120.75</span>
									<strong class="float-left">TOTAL:</strong>
								</span>

								<hr />

								<a href="shop-checkout.html" class="btn btn-primary btn-lg btn-block fs-15"><i class="fa fa-mail-forward"></i> Proceed to Checkout</a>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /CART -->
			
		</div>
	</section> --}}
	<!-- /CART -->
		<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
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
										<span id="product-{{$product->id}}-price">{{$product->currentPrice}}</span>{{$currency}}
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
											{{$product->currentPrice * $product->pivot->quantity}}
										</span>{{$currency}} 
									</td>
								</tr>
							@endforeach
							<tr>
								<td class="total-quantity" colspan="4">
									{{trans('general.total')}} <span id="items-count"></span> {{trans('general.items')}}</td>
								<td class="total-amount" id="total-amount">{{$currency}}</td>
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
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection

@section('optionalScripts')
	<script>
		$(document).ready(function(){
			function countTotal(){
			let prices = $('.product-times-quantity');
				let totalPrice = 0;
				for(let i = 0; i< prices.length; i++){
					totalPrice += Number($(prices[i]).text());
				}

				$('#total-amount').text(totalPrice.toFixed(1) + '{{$currency}}')

			}

			function countCartItems(){
				const items = $('.cart-item').length;
				$('#items-count').text(items);
			}

			$('.product-quantity').on('change', function(){
				const productId = $(this).data('product');
				const quantity = $(this).val();
				changeQuantity(productId, quantity);
				const currnetPrice = $('#product-'+productId+'-price').text();
				let totalPriceForProduct = $('#product-'+productId+'-total');
				totalPriceForProduct.html((Number(currnetPrice)*Number(quantity)).toFixed(1));
				countTotal();
			});

			function changeQuantity(productId, quantity){
				$.ajaxSetup({
   				    headers:
  					    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
				});
				$.ajax({
					type: 'POST',
					url: '{{route('purchases.changeQuantity')}}',
					data:{
						product_id: productId,
						quantity: quantity,
					},
					success: function (response){
						flashMessage('success', response.message);
					},
					error: function(error){
						flashMessage('danger', response.message);
					}

				});
			}

			$('.remove-from-cart').on('click', function(){
				const product = $(this).data('product');

				$.ajaxSetup({
					headers:
  					    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
				});
				$.ajax({
					type: 'DELETE',
					url: '{{route('purchases.deleteFromCart')}}',
					data:{
						product_id: product
					},
					success: function(response){
						flashMessage('success', response.message);
						countTotal();

					},
					error: function(error){
						flashMessage('danger', response.message);
					}
				});
			});

			countTotal();
			countCartItems();
		});
	</script>
@endsection