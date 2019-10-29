@extends($path.'master')
@section('optionalHead')
	<style>
		.form-horizontal{
			padding: 15px;
		}
	</style>
@endsection
@section('content')
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
					<h1 class="page-title">{{trans('general.checkout')}}</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->

					<table class="table cart">
						<thead>
							<tr>
								<th>{{trans('general.product')}}</th>
								<th>{{trans('general.price')}} </th>
								<th>{{trans('general.quantity')}}</th>
								<th class="amount">{{trans('general.total')}} </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="product"><a href="shop-product.html">{{$product->title}}</a> <small>{{$product->subtitle}}</small></td>
								<td class="price">
									@if($product->reduction)
										{{$product->reductedPrice.$currency}}
									@else
										{{$product->price.$currency}}
									@endif
								</td>
								<td class="quantity">
									<div class="form-group">
										<input type="text" class="form-control" value="{{$quantity}}" disabled>
									</div>											
								</td>
								<td class="amount">$XXXXXXXXX </td>
							</tr>
							<tr>
								<td class="total-quantity" colspan="3">Total XXXX Items</td>
								<td class="total-amount">$XXXXXXXxx.00</td>
							</tr>
						</tbody>
					</table>
					<div class="space-bottom"></div>

					@include($path.'partials/purchases/purchase-informations')
					
					<div class="text-right">	
						<a href="shop-cart.html" class="btn btn-group btn-default"><i class="icon-left-open-big"></i> Go Back To Cart</a>
						<a href="shop-checkout-payment.html" class="btn btn-group btn-default">Next Step <i class="icon-right-open-big"></i></a>
					</div>

				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection