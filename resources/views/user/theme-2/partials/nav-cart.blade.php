<li class="quick-cart">
	<a href="#">
		<span class="badge badge-aqua badge-corner">{{$cart->count()}}</span>
		<i class="fa fa-shopping-cart"></i> 
	</a>
	<div class="quick-cart-box">
		<h4>{{trans('general.my-cart')}}</h4>

		<div class="quick-cart-wrapper">

			@foreach($cart as $product)
				<a href="{{$product->showRoute}}"><!-- cart item -->
					<img src="{{$product->thumbnail}}" width="45" height="45" alt="">
					<h6><span>{{$product->pivot->quantity}}x</span> {{$product->name}}</h6>
					<small>{{$product->formatedCurrentPrice . $cart->currency}}</small>
				</a><!-- /cart item -->
			@endforeach

		</div>

		<!-- quick cart footer -->
		<div class="quick-cart-footer clearfix">
			<a href="{{route('cart.cart')}}" class="btn btn-primary btn-sm float-right uppercase">{{trans('general.navigation.view-cart')}}</a>
			<span class="float-left"><strong>{{trans('general.total')}}:</strong> {{$cart->totalPrice}}</span>
		</div>
		<!-- /quick cart footer -->

	</div>
</li>