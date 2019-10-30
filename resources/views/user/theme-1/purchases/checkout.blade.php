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

					<form action="{{route('purchases.store')}}" method="POST">
						@csrf
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
									<td class="product"><a href="{{$product->showRoute}}">{{$product->name}}</a> <small>{{$product->short_description}}</small></td>
									<td class="price">
											{{$product->currentPrice.$currency}}
									</td>
									<td class="quantity">
										<div class="form-group">
											<input name="products[{{$product->id}}]" type="text" class="form-control" value="{{$quantity}}" readonly="">
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
							<button type="submit" class="btn btn-group btn-default">Next Step <i class="icon-right-open-big"></i></button>
						</div>
					</form>

				</div>
				<!-- main end -->
			</div>

		</div>
	</section>
	<!-- main-container end -->
@endsection