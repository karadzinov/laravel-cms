@extends($path.'master')
@section('optionalHead')
	<style>
		.bestseller-img{
			width: 263px;
			height: 133px;
			object-fit: cover;
		}
	</style>
@endsection
@section('content')
	<section class="main-container">
		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-9">
					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{{$category->name}}</h1>
					<div class="separator-2"></div>
					@if($products->count())
						<!-- page-title end -->
						<div class="row masonry-grid-fitrows grid-space-10" style="position: relative; height: 1598.91px;">
							@foreach($products as $product) 
								@if($product->reduction)
									@include($path . 'partials/products/with-reduction')
								@else
									@include($path . 'partials/products/without-reduction')
								@endif
							@endforeach
						</div>
						<!-- pills end -->
						<!-- pagination start -->
						<nav class="text-center">
							{{$products->links()}}
						</nav>
						<!-- pagination end -->
					@else
						<p class="lead">{{trans('general.no-results')}}</p>
					@endif
				</div>
				<!-- main end -->

				<!-- sidebar start -->
				<!-- ================ -->
				<aside class="col-md-3">
					<div class="sidebar">
						@if($bestSellers->count())
							<div class="block clearfix">
								<h3 class="title">{{trans('general.best-sellers')}}</h3>
								<div class="separator-2"></div>
								<div id="carousel-sidebar" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators top">
										<li data-target="#carousel-sidebar" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-sidebar" data-slide-to="1" class=""></li>
										<li data-target="#carousel-sidebar" data-slide-to="2" class=""></li>
									</ol>
									<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										@foreach($bestSellers as $bestSeller)
											<div class="item @if($loop->iteration==1) active @endif">
												<div class="listing-item">
													<div class="overlay-container">
														<img class="bestseller-img" src="{{asset('images/products/thumbnails/'.$bestSeller->main_image)}}" alt="product">
														@if($bestSeller->reduction)
															<span class="badge">-{{$bestSeller->reduction}}%</span>
														@endif
														<a href="{{route('products.show', $bestSeller->slug)}}" class="overlay-link"><i class="fa fa-link"></i></a>
													</div>
													<h3><a href="{{route('products.show', $bestSeller->slug)}}">{{$bestSeller->name}}</a></h3>
													<span class="price">
														@if($bestSeller->reduction)
															<del>{{$product->price.$settings->currencySymbol}}</del> 
															{{$bestSeller->price - ($bestSeller->price*$bestSeller->reduction/100).$settings->currencySymbol}}
														@else
															{{$bestSeller->price}}
														@endif
													</span>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						@endif
						@if($topRated->count())
							<div class="block clearfix">
								<h3 class="title">{{trans('general.top-rated')}}</h3>
								<div class="separator-2"></div>
								@foreach($topRated as $top)
									<div class="media margin-clear">
										<div class="media-left">
											<div class="overlay-container">
												<img class="media-object" src="{{asset('images/products/thumbnails/'.$top->main_image)}}" alt="thumb">
												<a href="{{route('products.show', $top->slug)}}" class="overlay-link small"><i class="fa fa-link"></i></a>
											</div>
										</div>
										<div class="media-body">
											<h6 class="media-heading"><a href="{{route('products.show', $top->slug)}}">{{$top->name}}</a></h6>
											<p class="margin-clear">
												@include($path.'partials/products/rating', ['count'=>round($top->avg)])
											</p>
											<p class="price">
												@if($top->reduction)
													<del>{{$product->price.$settings->currencySymbol}}</del> 
													{{$top->price - ($top->price*$top->reduction/100).$settings->currencySymbol}}
												@else
													{{$top->price}}
												@endif
											</p>
										</div>
										<hr>
									</div>
								@endforeach
							</div>
						@endif
						<div class="block clearfix">
							<h3 class="title">{{trans('general.categories')}}</h3>
							<div class="separator-2"></div>
							<nav>
								<ul class="nav nav-pills nav-stacked list-style-icons">
									@foreach($categories as $productcategory)
										<li><a href="{{$productcategory->showRoute}}"><i class="fa fa-caret-right pr-10"></i>{{$productcategory->name}}</a></li>
									@endforeach
								</ul>
							</nav>
						</div>
					</div>
				</aside>
				<!-- sidebar end -->
			</div>
		</div>
	</section>
@endsection