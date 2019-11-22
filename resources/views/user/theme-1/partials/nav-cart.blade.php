<div class="btn-group dropdown">
	<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-basket-1"></i><span class="cart-count default-bg">{{$cart->count()}}</span></button>
	<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
		<li>
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="quantity">{{trans('general.navigation.quantity-short')}}</th>
						<th class="product">{{trans('general.navigation.product')}}</th>
						<th class="amount">{{trans('general.navigation.subtotal')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $product)
						<tr>
							<td class="quantity">{{$product->pivot->quantity}} x</td>
							<td class="product"><a href="template/shop-product.html">{{$product->name}}</a><span class="small">{{$product->short_description}}</span></td>
							<td class="amount pull-right">{{$product->formatedCurrentPrice.$cart->currency}}</td>
						</tr>
					@endforeach
					<tr>
						<td class="total-quantity" colspan="2">{{trans('general.total')}} {{$cart->count()}} {{trans('general.items')}}</td>
						<td class="total-amount">{{$cart->totalPrice}}</td>
					</tr>
				</tbody>
			</table>
			<div class="panel-body text-right">
				<a href="{{route('cart.cart')}}" class="btn btn-group btn-gray btn-sm">{{trans('general.navigation.view-cart')}}</a>
				<a href="{{route('purchases.checkoutCart')}}" class="btn btn-group btn-gray btn-sm">{{trans('general.checkout')}}</a>
			</div>
		</li>
	</ul>
</div>