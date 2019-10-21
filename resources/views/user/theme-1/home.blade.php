@extends($path . 'master')

@section('optionalHead')
	<style>
		.section-title{
			margin-top: 70px;
		}
		.about-images{
			height:455px;
			width: 100%;
			object-fit: cover;
		}
		.about-slider-image{
			height: 340px;
			width: 100%;
			object-fit: cover;
			/*margin-top: 53px;*/
		}
		.mb-0{
			margin-bottom: 0;
		}
		.about-text{
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
		.about-text .btn-lg{
			margin-bottom: 0
		}
		.our-offer{
			height: 361px;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
	</style>
@endsection

@section('content')
	@if($slides->isNotEmpty())
		@include($path . 'partials/homepage/top-slider')
	@endif
	
	<div id="page-start"></div>

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-30 clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">
						{{trans('welcome') . ' '. trans('to') . ' ' . $settings->title}}
					</h2>
					<div class="separator"></div>
					@if($about)
						<p class="large text-center">
							{{$about->welcome_note}}
						</p>
					@endif
				</div>
			</div>
				@if($categories->isNotEmpty())
					<div class="row">
						@foreach($categories as $category)
							<div class="col-md-4 ">
								<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
									<span class="icon circle"> <img class="img-circle" src="{{asset('images/categories/thumbnails/').'/'.$category->image}}" alt=""> </span>
									<h3>{{$category->name}}</h3>
									<div class="separator clearfix"></div>
									<p>{{ substr($category->description, 0, 200) }}...</p>
									<a href="{{$category->showRoute}}">{{trans('general.read_more')}} <i class="pl-5 fa fa-angle-double-right"></i></a>
								</div>
							</div>
						@endforeach
					</div>
				@endif
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
								<h1 class="title">{{trans('general.contact_us')}}</h1>
								<p>{{trans('general.if-questions-contact')}}</p>
							</div>
							<div class="col-sm-4">
								<br>
								<p><a href="{{route('contact')}}" class="btn btn-lg btn-gray-transparent btn-animated">{{trans('general.navigation.contact')}}<i class="fa fa-arrow-right pl-20"></i></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	@if($about)
		@include($path . 'partials/homepage/middle-slider')
	@endif

	<!-- section -->
	<!-- ================ -->
	@if($about)
		@include($path . 'partials/homepage/about')
	@endif
	<!-- section end -->

	@if($posts->isNotEmpty())
		<!-- section -->
		<!-- ================ -->
		<section class="pv-30 padding-bottom-clear">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="text-center">{{trans('general.navigation.posts')}}</h2>
						<div class="separator"></div>
						<p class="large text-center">
							{{trans('general.check-latest-news')}}
						</p>
						<br>
					</div>
				</div>
			</div>
			<div class="space-bottom">
				<div class="owl-carousel carousel">
					@foreach($posts as $post)
						<div class="image-box shadow text-center">
							<div class="overlay-container">
								<img class="post-exemple-item" src="{{asset('images/posts/originals/'.$post->image)}}" alt="">
								<div class="overlay-top">
									<div class="text">
										<h3><a href="{{$post->showRoute}}">{{$post->title}}</a></h3>
										<p class="small">{{$post->subtitle}}</p>
									</div>
								</div>
								<div class="overlay-bottom">
									<div class="links">
										<a href="{{$post->showRoute}}" class="btn btn-gray-transparent btn-animated">{{trans('general.read-more')}} <i class="pl-10 fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>

				@include($path . 'partials/homepage/testimonials-slider')
				
				<h2 class="text-center section-title">{{trans('general.our-partners')}}</h2>
				<div class="separator"></div>
				<div class="container">
					<div class="clients-container">
						<div class="clients">
							@php
								$effectDelay = 200;
							@endphp
							@foreach($partners as $partner)
								<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="{{$effectDelay}}">
								<a href="{{$partner->link}}"><img src="{{$partner->thumbnailPath}}" alt=""></a>
							</div>
							@php
								$effectDelay += 200;
							@endphp
							@endforeach
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- section end -->
	@endif

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-40 stats padding-bottom-clear dark-translucent-bg hovered" style="background-image:url('{{asset('images/about/originals/'.optional($about)->image)}}');background-position: 50% 50%;">
		<div class="clearfix">
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-diamond"></i></span>
					<h3><strong>{{trans('general.projects')}}</strong></h3>
					<span class="counter" data-to="1525" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-users"></i></span>
					<h3><strong>{{trans('general.clients')}}</strong></h3>
					<span class="counter" data-to="1225" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-cloud-download"></i></span>
					<h3><strong>{{trans('general.downloads')}}</strong></h3>
					<span class="counter" data-to="12235" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-share"></i></span>
					<h3><strong>{{trans('general.shares')}}</strong></h3>
					<span class="counter" data-to="15002" data-speed="5000">0</span>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->
			
@endsection