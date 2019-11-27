<a href="{{$product->showRoute}}" class="nav-cart-item" data-nav-cart-product="{{ $product->id }}"><!-- cart item -->
	<img src="{{$product->thumbnail}}" width="45" height="45" alt="">
	<h6><span>{{$product->pivot->quantity}}x</span> {{$product->name}}</h6>
	<small><span class="nav-cart-price">{{$product->formatedCurrentPrice}}</span>{{ $settings->currencySymbol}}</small>
</a><!-- /cart item -->