<tr class="nav-cart-item">
	<td class="quantity">{{$product->pivot->quantity}} x</td>
	<td class="product"><a href="{{ $product->showRoute }}">{{$product->name}}</a><span class="small">{{$product->short_description}}</span></td>
	<td class="amount pull-right"><span class="nav-cart-price">{{$product->formatedCurrentPrice}}</span>{{ $cart->currency}}</td>
</tr>