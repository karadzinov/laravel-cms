@extends($path . 'master')

@section('content')
	<!-- banner start -->
	<!-- ================ -->
	<div class="banner dark-translucent-bg" style="background-image:url('{{asset('assets/theme-1/images/shop-banner.jpg')}}'); background-position:50% 32%;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 text-center col-md-offset-2 pv-20">
					<h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">{{trans('general.welcome-to')}} <strong>{{trans('general.shop')}}</strong></h2>
					<div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
					<p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">{{trans('general.products-top-text')}}</p>
				</div>
			</div>
		</div>			
	</div>
	<!-- banner end -->

	<!-- section start -->
	<!-- ================ -->
	<div class="dark-bg section">
		<div class="container">
			<!-- filters start -->
			<div class="sorting-filters text-center mb-20">
				<form class="form-inline" action="{{route('products.index')}}" method="GET">
					<div class="form-group">
						<label>{{trans('general.sort-by')}}</label>
						<select name="sort_by" class="form-control">
							<option value="">{{trans('general.select')}}</option>
							<option value="created_at" @if(isset($request['sort_by']) && $request['sort_by']==='created_at') selected='selected' @endif>
								{{trans('general.date')}}
							</option>
							<option value="price" @if(isset($request['sort_by']) && $request['sort_by']==='price') selected='selected' @endif>
								{{trans('general.price')}}
							</option>
						</select>
					</div>
					<div class="form-group">
						<label>{{trans('general.order')}}</label>
						<select name="order" class="form-control">
							<option value="">{{trans('general.select')}}</option>
							<option value="asc" @if(isset($request['order']) && $request['order']==='asc') selected='selected' @endif>
								{{trans('general.ascending')}}
							</option>
							<option value="desc" @if(isset($request['order']) && $request['order']==='desc') selected='selected' @endif>
								{{trans('general.descending')}}
							</option>
						</select> 
					</div>
					<div class="form-group">
						<div class="row grid-space-10">
							<div class="col-sm-6">
								<label>{{trans('general.price')}} {{ $settings->currencySymbol }} ({{trans('general.min')}})</label>
								<input type="number" name="price_min" class="form-control" placeholder="0" @if(isset($request['price_min'])) value="{{intval($request['price_min'])}}"@endif>
							</div>
							<div class="col-sm-6">
								<label>{{trans('general.price')}} {{ $settings->currencySymbol }} ({{trans('general.max')}})</label>
								<input type="number" name="price_max" class="form-control col-xs-6" placeholder="&#8734" @if(isset($request['price_max'])) value="{{intval($request['price_max'])}}" @endif>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>{{trans('general.category')}}</label>
						<select name="category" class="form-control">
							<option value="">{{trans('general.select')}}</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}" @if(isset($request['category']) && $request['category']==$category->id) selected='selected' @endif>
									{{$category->name}}
								</option>
							@endforeach
						</select> 
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">{{trans('general.submit')}}</button>
					</div>
				</form>
			</div>
			<!-- filters end -->
		</div>
	</div>
	<!-- section end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">
					<div class="clear-style">
						<div class="">
							@if($products->isNotEmpty())
								<div class="row masonry-grid-fitrows grid-space-10">
									@foreach($products as $product) 
										@if($product->reduction)
											@include($path . 'partials/products/with-reduction')
										@else
											@include($path . 'partials/products/without-reduction')
										@endif
									@endforeach
								</div>
							@else
								<p>
									{{trans('general.no-results')}}
								</p>
							@endif
						</div>
					</div>
					<!-- pills end -->
					<!-- pagination start -->
					<nav class="text-center">
						{{$products->links()}}
					</nav>
					<!-- pagination end -->
				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection
