@extends('layouts/master')
@section('optionalHead')
	<style>
		.about-images-slider-item{
			width: 100%;
			object-fit: cover;
			height: 260px;
		}
	</style>
@endsection
@section('content')
	<!-- banner start -->
	<!-- ================ -->
	<div class="banner border-clear light-translucent-bg" style="background-image:url('{{asset('images/about/originals/'.$about->image)}}');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 pv-20">
					<h2 class="title"><strong>{{trans('general.welcome')}}</strong> {{trans('general.to')}} {{$settings->title}}</h2>
					{!!$about->welcome_note!!}
				</div>
			</div>
		</div>

	</div>
	<!-- banner end -->
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
					<h1 class="page-title">{{trans('general.about_us')}}</h1>
					<div class="separator-2 mb-20"></div>
					<!-- page-title end -->

					<div class="row">
						<div class="col-md-6">
							{!!$about->about!!}
						</div>

						<!-- sidebar start -->
						<!-- ================ -->
						<aside class="sidebar col-md-6">
							<div class="block clearfix">
								<div class="embed-responsive embed-responsive-16by9">
									{!!$about->videoPreview!!}
								</div>
							</div>
						</aside>
						<!-- sidebar end -->
					</div>

					<h2 class="title">{{trans('general.why')}} <strong>{{trans('general.choose_us')}}</strong></h2>
					<div class="separator-2"></div>
					{!!$about->why_us!!}
				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-40 stats padding-bottom-clear light-translucent-bg hovered background-img-5">
		<div class="clearfix">
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg circle"><i class="fa fa-diamond"></i></span>
					<h3><strong>{{trans('general.projects')}}</strong></h3>
					<span class="counter" data-to="1525" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg circle"><i class="fa fa-users"></i></span>
					<h3><strong>{{trans('general.clients')}}</strong></h3>
					<span class="counter" data-to="1225" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg circle"><i class="fa fa-cloud-download"></i></span>
					<h3><strong>{{trans('general.downloads')}}</strong></h3>
					<span class="counter" data-to="12235" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg circle"><i class="fa fa-share"></i></span>
					<h3><strong>{{trans('general.shares')}}</strong></h3>
					<span class="counter" data-to="15002" data-speed="5000">0</span>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<section class="pv-30 light-gray-bg clearfix">
		<div class="container">
			<div class="row">
				@if($testimonials->count())
					<div class="col-md-6">
						<div class="owl-carousel content-slider">
							@foreach($testimonials as $testimonial)
								<div class="testimonial text-center padding-ver-clear">
									<h3>{{$testimonial->title}}</h3>
									<div class="separator"></div>
									<div class="testimonial-body">
										<blockquote>
											<p>{{$testimonial->content}}</p>
										</blockquote>
										<div class="testimonial-info-1">- {{$testimonial->name}}</div>
										@if($testimonial->company)
											<div class="testimonial-info-2">By {{$testimonial->company}}</div>
										@endif
									</div>
								</div>
							@endforeach
						</div>
					</div>
				@endif
				@if($about->images->isNotEmpty())
					<div class="col-md-6">
						<div class="owl-carousel content-slider-with-controls">
							@for($i=0; $i<$about->images->count(); $i++)
								<div class="overlay-container overlay-visible">
									<img class="about-images-slider-item" src="{{$about->originalPath . $about->images[$i]->name}}" alt="">
									<a href="{{$about->originalPath . $about->images[$i]->name}}" class="popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
								</div>
							@endfor
						</div>
					</div>
				@endif
			</div>
		</div>
	</section>
@endsection