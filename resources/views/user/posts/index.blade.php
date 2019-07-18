@extends('layouts/master')
@section('optionalHead')
	<style>
		.light-gray-bg{
			margin-top: 65px;
		}
	</style>
@endsection
@section('content')
	@if($posts->isNotEmpty())
		<!-- banner start -->
		<!-- ================ -->
		<div class="light-gray-bg banner pv-40">
			<div class="container clearfix">

				<!-- slideshow start -->
				<!-- ================ -->
				<div class="slideshow">
					
					<!-- slider revolution start -->
					<!-- ================ -->
					<div class="slider-banner-container">
						<div class="slider-banner-boxedwidth-no-shadow">
							<ul class="slides">
								@foreach($slider as $slide)
									<!-- slide 1 start -->
									<!-- ================ -->
									<li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="{!!$slide->title!!}">
									
									<!-- main image -->
									<img src="{{$slide->originalPath}}" alt="slidebg1" data-bgposition="center {{-- top --}}"  data-bgrepeat="no-repeat" data-bgfit="cover">
									
									<!-- Transparent Background -->
									<div class="tp-caption dark-translucent-bg"
										data-x="center"
										data-y="bottom"
										data-speed="600"
										data-start="0">
									</div>

									<!-- LAYER NR. 1 -->
									<div class="tp-caption sfb fadeout large_white"
										data-x="left"
										data-hoffset="20"
										data-y="110"
										data-speed="500"
										data-start="1000"
										data-easing="easeOutQuad">{!!$slide->title!!}
									</div>	

									<!-- LAYER NR. 2 -->
									<div class="tp-caption sfb fadeout hidden-xs large_white tp-resizeme"
										data-x="left"
										data-hoffset="20"
										data-y="175"
										data-speed="500"
										data-start="1300"
										data-easing="easeOutQuad"><div class="separator-2 light"></div>
									</div>	

									<!-- LAYER NR. 3 -->
									<div class="tp-caption sfb fadeout medium_white hidden-xs"
										data-x="left"
										data-hoffset="20"
										data-y="190"
										data-speed="500"
										data-start="1300"
										data-easing="easeOutQuad"
										data-endspeed="600">{!!$slide->subtitle!!}...
									</div>

									<!-- LAYER NR. 4 -->
									<div class="tp-caption sfb fadeout small_white hidden-xs"
										data-x="left"
										data-hoffset="20"
										data-y="300"
										data-speed="500"
										data-start="1600"
										data-easing="easeOutQuad"
										data-endspeed="600"><a href="{{$slide->showRoute}}" class="btn btn-default btn-animated">Read More <i class="fa fa-arrow-right"></i></a>
									</div>

									</li>
									<!-- slide 1 end -->
								@endforeach
							</ul>
							<div class="tp-bannertimer"></div>
						</div>
					</div>
					<!-- slider revolution end -->

				</div>
				<!-- slideshow end -->

			</div>
		</div>
		<!-- banner end -->
		<section class="main-container">

			<div class="container">
				<div class="row">

					<!-- main start -->
					<!-- ================ -->
					<div class="main col-md-12">

						<!-- page-title start -->
						<!-- ================ -->
						<h1 class="page-title text-center">Featured Posts</h1>
						<div class="separator with-icon">
							<i class="fa fa-pencil bordered"></i>
						</div>
						<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						<br>
						<br>
						<!-- page-title end -->

						@include('partials/user/posts/posts-list')

					</div>
					<!-- main end -->

				</div>
			</div>
		</section>
	@else
		<div class="text-center pv-40">
			<p class="lead center">There is no posts on this subject.</p>
		</div>
	@endif
@endsection
