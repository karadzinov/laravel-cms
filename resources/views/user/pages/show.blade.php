@extends('layouts/master')
@section('optionalHead')
	<style>
		#mainImage{
			max-height: 600px;
			margin: 0 auto;
		}
		.bottomImage{
			height: 167.5px !important;
			margin: 0 auto;
		}
	</style>
@endsection
@section('content')
	<!-- breadcrumb start -->
	<!-- ================ -->
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
				<li class="active">{!!$page->title!!}</li>
			</ol>
		</div>
	</div>
	<!-- breadcrumb end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{!!$page->title!!}</h1>
					<div class="separator-2"></div>
					<p class="lead">{!!$page->subtitle!!}</p>
					<div class="separator-2"></div>
					@if($page->images->isNotEmpty())
						<div class="shadow bordered">
							<div class="overlay-container">
								<img id="mainImage" src="{{$page->originalPath . $page->images()->first()->name}}" alt="">
								<a href="{{$page->originalPath . $page->images->first()->name}}" class="overlay-link popup-img" title="First image title">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							@php
								$page->images->shift()
							@endphp
						</div>
						<div class="space-bottom"></div>
						<div class="row grid-space-20">
							@foreach($page->images as $image)
								<div class="col-xs-3">
									<div class="overlay-container">
										<img class="bottomImage" src="{{$page->thumbnailPath . $image->name}}" alt="">
										<a href="{{$page->originalPath . $image->name}}" class="overlay-link small popup-img" title="Second image title">
											<i class="fa fa-plus"></i>
										</a>
									</div>
								</div>
							@endforeach
							{{-- <div class="col-xs-3">
								<div class="overlay-container">
									<img src="{{asset('assets/images/portfolio-3.jpg')}}" alt="">
									<a href="{{asset('assets/images/portfolio-3.jpg')}}" class="overlay-link small popup-img" title="Third image title">
										<i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="overlay-container">
									<img src="{{asset('assets/images/portfolio-4.jpg')}}" alt="">
									<a href="{{asset('assets/images/portfolio-4.jpg')}}" class="overlay-link small popup-img" title="Fourth image title">
										<i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="overlay-container">
									<img src="{{asset('assets/images/portfolio-5.jpg')}}" alt="">
									<a href="{{asset('assets/images/portfolio-5.jpg')}}" class="overlay-link small popup-img" title="Fifth image title">
										<i class="fa fa-plus"></i>
									</a>
								</div>
							</div> --}}
						</div>
						<br>
						<br>
					@endif
					{!!$page->main_text!!}

				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
	
	<!-- footer top start -->
	<!-- ================ -->
	<div class="dark-bg  default-hovered footer-top animated-text">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action text-center">
						<div class="row">
							<div class="col-sm-8">
								<h2>Powerful Bootstrap Template</h2>
								<h2>Waste no more time</h2>
							</div>
							<div class="col-sm-4">
								<p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent ">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer top end -->

@endsection