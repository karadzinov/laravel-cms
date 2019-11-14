<div class="col-md-6 col-sm-12 masonry-grid-item">
	<div class="listing-item bordered light-gray-bg mb-20">
		<div class="row grid-space-0">
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="overlay-container">
					<img class="product-thumbnail" src="{{$product->thumbnail}}" alt="">
					<a class="overlay-link popup-img-single" href="{{$product->original}}"><i class="fa fa-search-plus"></i></a>
				</div>
			</div>
			<div class="col-sm-6 col-md-8 col-lg-9">
				<div class="body">
					<h3 class="margin-clear"><a href="{{$product->showRoute}}">{{$product->name}}</a></h3>
					<p>
						@include($path.'partials/products/rating', ['count'=>$product->rating])
						@if($wishlist->contains($product))
							<span class="wishlist-button remove-from-wishlist" data-product="{{$product->id}}" title="{{trans('general.added-to-wishlist')}}"><i class="fa fa-heart in-wishlist"></i></span>
						@else
							<span class="wishlist-button add-to-wishlist" data-product="{{$product->id}}"><i class="fa fa-heart-o" title="{{trans('general.add-to-wishlist')}}"></i></span>
						@endif
					</p>
					<p class="small">{{$product->short_description}}</p>
					<div class="elements-list clearfix">
						<span class="price">{{$product->price.$currency}}</span>
						@if($cart->contains($product))
							<a href="{{route('cart.cart')}}" class="pull-right btn btn-sm btn-default btn-animated">
								<i class="fa fa-lg fa-cart-plus"></i>
								  &nbsp{{trans('general.already-in-cart')}}
							</a>
						@else
							<a href="javascript:void(0)" data-product="{{$product->id}}" class="pull-right btn btn-sm btn-default-transparent btn-animated add-to-cart">{{trans('general.add-to-cart')}}<i class="fa fa-shopping-cart"></i></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>