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

					<form action="{{route('purchases.update', $purchase->id)}}" method="POST">
						@csrf
						@method('PUT')
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
								@foreach($purchase->products as $product)
									<tr class="cart-item">
										<td class="product"><a href="{{$product->showRoute}}">{{$product->name}}</a> <small>{{$product->short_description}}</small></td>
										<td class="price">
											@if($product->completed)
												{{$product->pivot->current_price.$currency}}
											@else
												{{$product->current_price.$currency}}
											@endif
										</td>
										<td class="quantity">
											<div class="form-group">
												<input name="products[{{$product->id}}]" type="text" class="form-control" value="{{$product->pivot->quantity}}" readonly="">
											</div>											
										</td>
										<td class="amount"><span class="product-times-quantity">{{$product->currentPrice*$product->pivot->quantity}}</span>{{$currency}} </td>
									</tr>
								@endforeach
								<tr>
									<td class="total-quantity" colspan="3">
										{{trans('general.total')}} {{$purchase->products()->count()}} {{trans('general.items')}}
									</td>
									<td class="total-amount">
										{{$purchase->total . $currency}}
									</td>
								</tr>
							</tbody>
						</table>
						<div class="space-bottom"></div>

						@include($path.'partials/purchases/purchase-informations')
						
						<div class="text-right">	
							<a href="{{route('cart.cart')}}" class="btn btn-group btn-default"><i class="icon-left-open-big"></i> {{trans('general.back-to-cart')}}</a>
							<button type="submit" class="btn btn-group btn-default">{{trans('general.next-step')}} <i class="icon-right-open-big"></i></button>
						</div>
					</form>

				</div>
				<!-- main end -->
			</div>

		</div>
	</section>
	<!-- main-container end -->
@endsection