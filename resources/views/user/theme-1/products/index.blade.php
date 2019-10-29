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
	<div class="banner dark-translucent-bg" style="background-image:url('{{asset('assets/user/theme-1/images/shop-banner.jpg')}}'); background-position:50% 32%;">
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
					<h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">Wellcome to <strong>Shop</strong></h2>
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
				<form class="form-inline">
					<div class="form-group">
						<label>Sort by</label>
						<select class="form-control">
							<option selected="selected">Date</option>
							<option>Price</option>
							<option>Model</option>
						</select>
					</div>
					<div class="form-group">
						<label>Order</label>
						<select class="form-control">
							<option selected="selected">Acs</option>
							<option>Desc</option>
						</select> 
					</div>
					<div class="form-group">
						<label>Price $ (min/max)</label>
						<div class="row grid-space-10">
							<div class="col-sm-6">
								<input type="text" class="form-control">
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control col-xs-6">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control">
							<option selected="selected">Smartphones</option>
							<option>Tablets</option>
							<option>Smart Watches</option>
							<option>Desktops</option>
							<option>Software</option>
							<option>Accessories</option>
						</select> 
					</div>
					<div class="form-group">
						<a href="#" class="btn btn-default">Submit</a>
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
						<li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals"><i class="icon-star"></i> Latest Arrivals</a></li>
						<li><a href="#pill-2" role="tab" data-toggle="tab" title="Featured"><i class="icon-heart"></i> Featured</a></li>
						<li><a href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers"><i class=" icon-up-1"></i> Top Sellers</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content clear-style">
						<div class="tab-pane active" id="pill-1">
							<div class="row masonry-grid-fitrows grid-space-10">
								@foreach($products as $product) 
									@if($product->reduction)
										@include($path . 'partials/products/with-reduction')
									@else
										@include($path . 'partials/products/without-reduction')
									@endif
								@endforeach
							</div>
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
						{{-- <ul class="pagination">
							<li><a href="#" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
						</ul> --}}
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
	<section class="section dark-translucent-bg background-img-2 pv-40" style="background-position: 50% 32%;">
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
	</section>
	<!-- section end -->
@endsection