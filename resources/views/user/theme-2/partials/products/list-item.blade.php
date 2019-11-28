<!-- ITEM -->
<li class="col-lg-4 col-sm-4">

	<div class="shop-item">

		<div class="thumbnail">
			<!-- product image(s) -->
			<a class="shop-item-image" href="{{$product->showRoute}}">
				<img class="product-thumbnail lazy" data-src="{{$product->medium}}" alt="{{$product->name}}" />
			</a>
			<!-- /product image(s) -->

			<!-- hover buttons -->
			<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
				@if($wishlist->contains($product))
					<a href="javascript:void(0)" class="btn btn-light wishlist-button remove-from-wishlist" data-product="{{$product->id}}" title="{{trans('general.added-to-wishlist')}}"><i class="fa fa-heart in-wishlist p-0"></i></a>
				@else
					<a href="javascript:void(0)" class="btn btn-light wishlist-button add-to-wishlist" data-product="{{$product->id}}" title="{{trans('general.add-to-wishlist')}}"><i class="fa fa-heart-o p-0"></i></a>
				@endif
			</div>
			<!-- /hover buttons -->
		</div>
		
		<div class="shop-item-summary text-center">
			<h2>
				<a href="{{$product->showRoute}}">
					{{$product->name}}
				</a>
			</h2>
			<small>{{$product->short_description}}</small>
			
			<!-- rating -->
			<div class="shop-item-rating-line">
				<div class="rating rating-{{$product->rating}} fs-13"><!-- rating-0 ... rating-5 --></div>
			</div>
			<!-- /rating -->

			<!-- price -->
			<div class="shop-item-price">
				@if($product->reduction)
					<span class="line-through">{{$product->formatedPrice.$settings->currencySymbol}}</span>
				@endif
				{{$product->formatedCurrentPrice.$settings->currencySymbol}}
			</div>
			<!-- /price -->
		</div>

		<!-- buttons -->
		<div class="shop-item-buttons text-center">
			@if($cart->contains($product))
				<a href="{{route('cart.cart')}}" class="pull-right btn btn-light btn-animated">
					<i class="fa fa-lg fa-shopping-cart"></i>
					  &nbsp{{trans('general.already-in-cart')}}
				</a>
			@else
				<a href="javascript:void(0)" data-product="{{$product->id}}" class="pull-right btn btn-info add-to-cart">{{trans('general.add-to-cart')}}<i class="fa fa-cart-plus"></i></a>
			@endif
		</div>
		<!-- /buttons -->
	</div>

</li>
<!-- /ITEM -->