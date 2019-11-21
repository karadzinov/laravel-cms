@extends($path.'master')
@section('optionalHead')
	<style>
		.product-image{
			width: 262px;
			object-fit: cover;
		}
	</style>
@endsection
@section('content')
	<div class="container mt-5">
		<h3 class="mb-3">{{trans('general.my-wishlist')}}</h3>
		@if($wishlist->isNotEmpty())
			@foreach($wishlist as $product)
				<div class="row mb-3">
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="overlay-container">
							<img class="product-image" src="{{$product->thumbnail}}" alt="">
							<a class="overlay-link" href="{{$product->showRoute}}"><i class="fa fa-plus"></i></a>
							@if($product->reduction)
								<span class="badge">-{{$product->reduction}} %</span>
							@endif
						</div>
					</div>
					<div class="col-sm-6 col-md-8 col-lg-9">
						<div class="body">
							<h3 class="margin-clear"><a href="{{$product->showRoute}}">{{$product->name}}</a></h3>
							<p>
								<i class="fa fa-star text-default"></i>
								<i class="fa fa-star text-default"></i>
								<i class="fa fa-star text-default"></i>
								<i class="fa fa-star text-default"></i>
								<i class="fa fa-star"></i>
								<span class="wishlist-button remove-from-wishlist" data-product="{{$product->id}}" title="{{trans('general.added-to-wishlist')}}"><i class="fa fa-heart in-wishlist"></i></span>
								<a href="{{$product->showRoute}}" class="btn-sm-link"><i class="icon-link pr-5"></i>{{trans('general.show')}}</a>
							</p>
							<p>{{$product->short_description}}</p>
							<div class="elements-list clearfix">
								<span class="price">
									@if($product->reduction)
										<del>{{$product->formatedPrice . ' ' . $currency}}</del>
									@endif
									{{$product->formatedCurrentPrice . ' ' . $currency}}</span>
								
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
			@endforeach
		@else
			<p class="lead">{{trans('general.empty-wishlist')}}</p>
		@endif
	</div>
@endsection

