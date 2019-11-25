<li class="quick-cart">
	<a href="#">
		<span class="badge badge-aqua badge-corner nav-cart-count">{{$cart->count()}}</span>
		<i class="fa fa-shopping-cart"></i> 
	</a>
	<div class="quick-cart-box">
		<h4>{{trans('general.my-cart')}}</h4>

		<div class="quick-cart-wrapper">

			@foreach($cart as $product)
				@include($path.'partials/nav-cart-item')
			@endforeach

		</div>

		<!-- quick cart footer -->
		<div class="quick-cart-footer clearfix">
			<a href="{{route('cart.cart')}}" class="btn btn-primary btn-sm float-right uppercase">{{trans('general.navigation.view-cart')}}</a>
			<span class="float-left">
				<strong>{{trans('general.total')}}:</strong> 
				<span id="nav-cart-total"></span> {{ $cart->currency }}
			</span>
		</div>
		<!-- /quick cart footer -->

	</div>
</li>