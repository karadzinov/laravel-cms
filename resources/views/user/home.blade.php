@extends('layouts/master')
@section('content')
	@include('partials/user/homepage/top-slider')
	
	<div id="page-start"></div>

	<!-- section start -->
	<!-- ================ -->
	<section class="light-gray-bg pv-30 clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">Core <strong>Features</strong></h2>
					<div class="separator"></div>
					<p class="large text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam voluptas facere vero ex tempora saepe perspiciatis ducimus sequi animi.</p>
				</div>
				@foreach($categories as $category)
					<div class="col-md-4 ">
						<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
							<span class="icon default-bg circle"><i class="fa fa-diamond"></i></span>
							<h3>{{$category->name}}</h3>
							<div class="separator clearfix"></div>
							<p>{{$category->description}}</p>
							<a href="{{$category->showRoute}}">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="section default-bg clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action text-center">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="title">Contact Us</h1>
								<p>If you have any questions or propositions please do not hesitate to contact us.</p>
							</div>
							<div class="col-sm-4">
								<br>
								<p><a href="{{route('contact')}}" class="btn btn-lg btn-gray-transparent btn-animated">Contact<i class="fa fa-arrow-right pl-20"></i></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	@include('partials/user/homepage/middle-slider')

	<!-- section start -->
	<!-- ================ -->
	<section class="light-gray-bg pv-20">
	</section>
	<!-- section end -->

	<!-- section -->
	<!-- ================ -->
	@include('partials/user/homepage/about')
	<!-- section end -->

	<!-- section -->
	<!-- ================ -->
	<section class="pv-30 light-gray-bg padding-bottom-clear">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">Latest <strong>Posts</strong></h2>
					<div class="separator"></div>
					<p class="large text-center">Atque ducimus velit, earum quidem, iusto dolorem. Ex ipsam totam quas blanditiis, pariatur maxime ipsa iste, doloremque neque doloribus, error. Corrupti, tenetur.</p>
					<br>
				</div>
			</div>
		</div>
		<div class="space-bottom">
			<div class="owl-carousel carousel">
				@foreach($posts as $post)
					<div class="image-box shadow text-center">
						<div class="overlay-container">
							<img src="{{asset('images/posts/originals/'.$post->image)}}" alt="">
							<div class="overlay-top">
								<div class="text">
									<h3><a href="portfolio-item.html">{{$post->title}}</a></h3>
									<p class="small">{{$post->subtitle}}</p>
								</div>
							</div>
							<div class="overlay-bottom">
								<div class="links">
									<a href="{{$post->showRoute}}" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			@include('partials/user/homepage/testimonials-slider')
			<div class="container">
				<div class="clients-container">
					<div class="clients">
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
							<a href="#"><img src="{{asset('assets/images/client-1.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="200">
							<a href="#"><img src="{{asset('assets/images/client-2.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
							<a href="#"><img src="{{asset('assets/images/client-3.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="400">
							<a href="#"><img src="{{asset('assets/images/client-4.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="500">
							<a href="#"><img src="{{asset('assets/images/client-5.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="600">
							<a href="#"><img src="{{asset('assets/images/client-6.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="700">
							<a href="#"><img src="{{asset('assets/images/client-7.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="800">
							<a href="#"><img src="{{asset('assets/images/client-8.png')}}" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-40 stats padding-bottom-clear dark-translucent-bg hovered background-img-7" style="background-position: 50% 50%;">
		<div class="clearfix">
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-diamond"></i></span>
					<h3><strong>Projects</strong></h3>
					<span class="counter" data-to="1525" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-users"></i></span>
					<h3><strong>Clients</strong></h3>
					<span class="counter" data-to="1225" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-cloud-download"></i></span>
					<h3><strong>Downloads</strong></h3>
					<span class="counter" data-to="12235" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-share"></i></span>
					<h3><strong>Shares</strong></h3>
					<span class="counter" data-to="15002" data-speed="5000">0</span>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->
			
@endsection