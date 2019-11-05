@extends($path . 'master')
@section('optionalHead')
	<style>
		.product-thumbnail{
			height: 206px;
			width: 155px;
			  object-fit: cover;

		}
	</style>
@endsection
@section('content')
	<!-- banner start -->
	<!-- ================ -->
	<div class="banner dark-translucent-bg" style="background-image:url('{{asset('assets/theme-1/images/shop-banner.jpg')}}'); background-position:50% 32%;">
		<!-- breadcrumb start -->
		<!-- ================ -->
		<div class="breadcrumb-container">
			<div class="container">
				<ol class="breadcrumb">
					<li><i class="fa fa-home pr-10"></i><a class="link-dark" href="index.html">Home</a></li>
					<li class="active">Shop 2 Columns</li>
				</ol>
			</div>
		</div>
		<!-- breadcrumb end -->
		<div class="container">
			<div class="row">
				<div class="col-md-8 text-center col-md-offset-2 pv-20">
					<h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">{{trans('general.welcome-to')}} <strong>{{trans('general.shop')}}</strong></h2>
					<div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
					<p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi perferendis magnam ea necessitatibus, officiis voluptas odit! Aperiam omnis, cupiditate laudantium velit nostrum, exercitationem accusamus, possimus soluta illo deserunt tempora qui.</p>
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
								<label>{{trans('general.price')}} {{$currency}} ({{trans('general.min')}})</label>
								<input type="number" name="price_min" class="form-control" placeholder="0" @if(isset($request['price_min'])) value="{{intval($request['price_min'])}}"@endif>
							</div>
							<div class="col-sm-6">
								<label>{{trans('general.price')}} {{$currency}} ({{trans('general.max')}})</label>
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
					<!-- pills start -->
					<!-- ================ -->
					<!-- Nav tabs -->
					<ul class="nav nav-pills" role="tablist">
						{{-- <li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="{{trans('general.latest-arrivals')}}"><i class="icon-star"></i> {{trans('general.latest-arrivals')}}</a></li> --}}
						{{-- <li><a href="#pill-2" role="tab" data-toggle="tab" title="{{trans('general.featured')}}"><i class="icon-heart"></i> {{trans('general.featured')}}</a></li> --}}
						{{-- <li><a href="#pill-3" role="tab" data-toggle="tab" title="{{trans('general.top-sellers')}}"><i class=" icon-up-1"></i> {{trans('general.top-sellers')}}</a></li> --}}
					</ul>
					<!-- Tab panes -->
					<div class="tab-content clear-style">
						<div class="tab-pane active" id="pill-1">
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
						<div class="tab-pane" id="pill-2">
							<div class="row masonry-grid-fitrows grid-space-10">
								2
							</div>
						</div>
						<div class="tab-pane" id="pill-3">
							<div class="row masonry-grid-fitrows grid-space-10">
								3
							</div>
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

	<!-- section start -->
	<!-- ================ -->
	{{-- <section class="section dark-translucent-bg background-img-2 pv-40" style="background-position: 50% 32%;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action text-center">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2 class="title"><strong>Subscribe</strong> To Our Newsletter</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus error pariatur deserunt laudantium nam, mollitia quas nihil inventore, quibusdam?</p>
								<div class="separator"></div>
								<form class="form-inline margin-clear">
									<div class="form-group has-feedback">
										<label class="sr-only" for="subscribe3">Email address</label>
										<input type="email" class="form-control form-control-lg" id="subscribe3" placeholder="Enter email" name="subscribe3" required="">
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<button type="submit" class="btn btn-lg btn-gray-transparent btn-animated margin-clear">Submit <i class="fa fa-send"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- section end -->
@endsection

@section('optionalScripts')
	<script>
		$(document).ready(function(){
			
			$('.add-to-cart').on('click', function(){
				const product_id = $(this).data('product');
				let element = $(this);

				 $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			        }
			    });
				$.ajax({

				   type:'POST',
				   url:'{{route('purchases.add-to-cart')}}',
				   data:{
				   		product_id
				   },
				   success:function(response){
				   	
				   	if(response.status === "already-added"){
				   		flashMessage("success", response.message);
				   		return;
				   	}
				   	
				   	flashMessage("success", response.message);
				   	element.html("{{trans('general.added-to-cart')}} <i class='fa fa-check'></i>");
				   },
				   error:function(response){
				   	
				   		flashMessage("danger", response.message);
				   }

				});
			});
		});
	</script>
@endsection