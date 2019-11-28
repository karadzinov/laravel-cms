@extends($path.'master')
@section('optionalHead')
	<style>
		#header.translucent + section.page-header{
			margin-top: 97px;
			padding: 10px;
		}
		.product-thumbnail{
			height: 540px;
			width: 100%;
			  object-fit: cover;

		}
	</style>
@endsection
@section('content')
	<section class="page-header page-header-xs start">
		<div class="container">

			<h1>{{$category->name}}</h1>

		</div>
	</section>

	<!-- -->
	<section>
		<div class="container">
			
			<div class="row">

				<!-- RIGHT -->
				<div class="col-lg-9 col-md-9">

					<!-- LIST OPTIONS -->
					<div class="clearfix shop-list-options mb-20">

						{{$products->links()}}

					</div>
					<!-- /LIST OPTIONS -->


					<ul class="shop-item-list row list-inline m-0">
						@foreach($products as $product)
							@include($path.'/partials/products/list-item')
						@endforeach
					</ul>

					<hr />

					<!-- Pagination Default -->
					<div class="text-center">
						{{$products->links()}}
					</div>
					<!-- /Pagination Default -->

				</div>


				<!-- LEFT -->
				<div class="col-lg-3 col-md-3">
					<!-- TOP RATED -->
					@if($topRated->count())
						<div class="mb-60">
							<h2 class="owl-featured">{{trans('general.top-rated')}}</h2>
							<div><!-- SLIDE 1 -->
								<ul class="list-unstyled m-0 p-0 text-left">
									@foreach($topRated as $top)
										<li class="clearfix"><!-- item -->
											<div class="thumbnail featured clearfix float-left mr-10">
												<a href="{{route('products.show', $top->slug)}}">
													<img data-src="{{asset('images/products/thumbnails/'.$top->main_image)}}" class="lazy" width="80" height="80" alt="featured item">
												</a>
											</div>

											<a class="block fs-12" href="{{route('products.show', $top->slug)}}">{{$top->name}}</a>
											<div class="rating rating-{{round($top->avg)}} fs-13 fw-100 text-left"><!-- rating-0 ... rating-5 --></div>
											
											<div class="fs-18 text-left">
												@if($top->reduction)
													<span class="line-through">{{$top->price.$settings->currencySymbol}}</span>
												@endif
												{{$top->price - ($top->price*$top->reduction/100).$settings->currencySymbol}}
											</div>
										</li><!-- /item -->
									@endforeach
								</ul>
							</div><!-- /SLIDE 1 -->
						</div>
					@endif
					<!-- \TOP RATED -->
					<!-- BESTSELLERS -->
					@if($bestSellers->count())
						<div class="mb-60">

							<h2 class="owl-featured">{{trans('general.best-sellers')}}</h2>
							<div class="owl-carousel featured" data-plugin-options='{"singleItem": true, "stopOnHover":false, "autoPlay":true, "autoHeight": true, "navigation": true, "pagination": false}'>
								
								@foreach($bestSellers as $bestSeller)
									<div><!-- SLIDE 1 -->
										<ul class="list-unstyled m-0 p-0 text-left">

											<li class="clearfix"><!-- item -->
												<div class="thumbnail featured clearfix float-left">
													<a href="{{route('products.show', $bestSeller->slug)}}">
														<img data-src="{{asset('images/products/thumbnails/'.$bestSeller->main_image)}}" class="lazy" width="80" height="80" alt="featured item">
													</a>
												</div>

												<a class="block fs-12" href="{{route('products.show', $bestSeller->slug)}}">{{$bestSeller->name}}</a>
												<div class="text-small text-left"><small>{{$bestSeller->short_description}}</small></div>
												<div class="fs-18 text-left">
													@if($bestSeller->reduction)
														<span class="line-through">{{$bestSeller->price.$settings->currencySymbol}}</span>
													@endif
													{{$bestSeller->price - ($bestSeller->price*$bestSeller->reduction/100).$settings->currencySymbol}}
												</div>
											</li><!-- /item -->
										</ul>
									</div><!-- /SLIDE 1 -->
								@endforeach

							</div>
						</div>
					@endif
					<!-- /BESTSELLERS -->
					<!-- CATEGORIES -->
					<div class="side-nav mb-60">

						<div class="side-nav-head">
							<button class="fa fa-bars"></button>
							<h4>{{trans('general.categories')}}</h4>
						</div>

						<ul class="list-group list-group-bordered list-group-noicon uppercase">
							@foreach($categories as $productCategory)
								<li class="list-group-item">
									<a href="{{$productCategory->showRoute}}"> 
										{{$productCategory->name}}
									</a>
								</li>
							@endforeach
						</ul>

					</div>
					<!-- /CATEGORIES -->
					
				</div>

			</div>
			
		</div>
	</section>
	<!-- / -->
@endsection