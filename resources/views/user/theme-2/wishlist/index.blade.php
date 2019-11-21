@extends($path.'master')
@section('optionalHead')
	<style>
		.product-image{
			width: 190px;
			min-height: 230px;
			object-fit: cover;
		}
		div.shop-item{
			background: white;
			margin-bottom: 0 !important;
		}
	</style>
@endsection
@section('content')
	<!-- -->
	<section style="margin-top: 100px;">
		<div class="container">
			
			@if($wishlist->isNotEmpty())
				<!-- LIST OPTIONS -->
				<div class="clearfix shop-list-options mb-20">

					<ul class="pagination m-0 float-right">
						{{$wishlist->links()}}
					</ul>
				</div>
				<!-- /LIST OPTIONS -->


				<ul class="shop-item-list row list-inline m-0">
					@foreach($wishlist as $product)
						<li class="col-lg-12">
							<div class="shop-item clearfix">

								<div class="thumbnail">
									<!-- product image(s) -->
									<a class="shop-item-image" href="{{$product->showRoute}}">
										<img class="product-image" src="{{$product->medium}}" alt="product">
									</a>
									<!-- /product image(s) -->

									<!-- product more info -->
									@if($product->reduction)
										<div class="shop-item-info">
											<span class="badge badge-success">-{{$product->reduction}}%</span>
										</div>
									@endif
									<!-- /product more info -->
								</div>
								
								<div class="shop-item-summary">
									<h2>{{$product->name}}</h2>
									
									<!-- rating -->
									<div class="rating rating-{{$product->rating}} fs-13"><!-- rating-0 ... rating-5 --></div>
									<!-- /rating -->
									<br>
									<p><!-- product short description -->
										{{$product->short_description}}
									</p><!-- /product short description -->

									<!-- price -->
									<div class="shop-item-price">
										@if($product->reduction)
											<span class="line-through">{{$product->formatedPrice.$currency}}</span>
										@endif
										{{$product->formatedCurrentPrice.$currency}}
									</div>
									<!-- /price -->

									<!-- buttons -->
									<div class="shop-item-buttons">
										@if($cart->contains($product))
											<a href="{{route('cart.cart')}}" class="pull-right btn btn-light btn-animated">
												<i class="fa fa-lg fa-shopping-cart"></i>
												  &nbsp{{trans('general.already-in-cart')}}
											</a>
										@else
											<a href="javascript:void(0)" data-product="{{$product->id}}" class="pull-right btn btn-info add-to-cart">{{trans('general.add-to-cart')}}<i class="fa fa-cart-plus"></i></a>
										@endif
										<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
										<a class="btn btn-light remove-from-wishlist" href="javascript:void(0)" data-product="{{$product->id}}" title="{{trans('general.remove-from-wishlist')}}"><i class="fa fa-heart in-wishlist p-0"></i></a>
									</div>
									<!-- /buttons -->
								</div>

							</div>

						</li>
					@endforeach
				</ul>

				<hr />

				<!-- Pagination Default -->
				<div class="text-center">
					<ul class="pagination">
						{{$wishlist->links()}}
					</ul>
				</div>
				<!-- /Pagination Default -->
			@else
				<p class="lead">{{trans('general.empty-wishlist')}}</p>
			@endif
			
		</div>
	</section>
	<!-- / -->
@endsection