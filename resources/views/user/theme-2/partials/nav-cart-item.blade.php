<a href="{{$product->showRoute}}"><!-- cart item -->
	<img src="{{$product->thumbnail}}" width="45" height="45" alt="">
	<h6><span>{{$product->pivot->quantity}}x</span> {{$product->name}}</h6>
	<small>{{$product->formatedCurrentPrice . $cart->currency}}</small>
</a><!-- /cart item -->