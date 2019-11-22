<tr>
	<td class="quantity">{{$product->pivot->quantity}} x</td>
	<td class="product"><a href="template/shop-product.html">{{$product->name}}</a><span class="small">{{$product->short_description}}</span></td>
	<td class="amount pull-right">{{$product->formatedCurrentPrice.$cart->currency}}</td>
</tr>