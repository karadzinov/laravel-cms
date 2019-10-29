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
							<tr class="remove-data">
								<td class="product"><a href="{{$product->showRoute}}">{{$product->name}}</a> <small>{{$product->short_description}}</small></td>
								<td class="price">
								@if($product->reduction)
									{{$product->reductedPrice.$currency}}
								@else
									{{$product->price.$currency}}
								@endif
								</td>
								<td class="quantity">
									<div class="form-group">
										<input type="text" class="form-control" value="{{$quantity}}">
									</div>											
								</td>
								<td class="remove"><a class="btn btn-remove btn-sm btn-default">{{trans('general.remove')}}</a></td>
								<td class="amount">$XXXXXXXXXX </td>
							</tr>
							<tr>
								<td class="total-quantity" colspan="4">Total XXXX Items</td>
								<td class="total-amount">$XXXXX.00</td>
							</tr>
						</tbody>
					</table>
					<div class="text-right">	
						<a href="{{$product->showRoute}}" class="btn btn-group btn-default">
							{{trans('general.back')}}
						</a>
						<a href="shop-checkout.html" class="btn btn-group btn-default">
							{{trans('general.chackout')}}
						</a>
					</div>

				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection