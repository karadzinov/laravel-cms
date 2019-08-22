@extends($path . 'master')
@section('optionalHead')
	<style>
		.b-0{
			padding-top: 40px;
			padding-bottom: 40px;
		}
		.b-0{
		}
		.about-page-gallery img{
			height: 370px;
			object-fit: cover;
		}
	</style>
@endsection
@section('content')
@if($about)
	<!-- PAGE HEADER -->
	<section class="page-header page-header-lg parallax parallax-10" style="background-image:url('{{asset('images/about/originals/'.$about->image)}}')">
		<div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>

		<div class="container">

			<h1>{{trans('general.navigation.about')}}</h1>
			<span class="font-lato fs-18 fw-300">{{$settings->slogan}}</span>

			<!-- breadcrumbs -->
			<ol class="breadcrumb">
				<li><a href="{{route('public.home')}}">{{trans('general.navigation.home')}}</a></li>
				<li class="active">{{trans('general.navigation.about')}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->

	<!-- -->
	<section class="b-0">
		<div class="container">
			
			<div class="row">
			
				<div class="col-lg-6 col-md-6 col-sm-6">

					<!-- OWL SLIDER -->
					<div class="owl-carousel buttons-autohide controlls-over m-0 box-shadow-1" data-plugin-options='{"items": 1, "autoHeight": true, "navigation": true, "pagination": true, "transitionStyle":"fade", "progressBar":"true"}'>
						@forelse($about->images as $image)
							<div class="about-page-gallery">
								<img class="img-fluid" src="{{$about->mediumPath . $image->name}}" alt="">
							</div>
						@empty
						@endforelse
					</div>
					<!-- /OWL SLIDER -->

				</div>

				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="heading-title heading-border-bottom">
						<h3>{{trans('general.welcome')}}</h3>
					</div>

					{!!$about->welcome_note!!}

				</div>

			</div>
			
		</div>
	</section>
	<!-- / -->

	<!-- -->
	<section class="b-0 video-b-0">
		<div class="container">
			
			<div class="row">

				<div class="col-lg-6">
					<div class="heading-title heading-border-bottom">
						<h3>{{trans('general.navigation.about')}}</h3>
					</div>
					{!!$about->about!!}

				</div>
				
				<div class="col-lg-6">

					@if($about->video)
						<div class=" box-shadow-1">
							<div class="embed-responsive embed-responsive-16by9">
								{!!$about->videoPreview!!}
							</div>
						</div>
					@endif

				</div>



			</div>
			
		</div>
	</section>
	<!-- / -->

	<section class="b-0 last-b-0">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mt-20">

						<div class="heading-title heading-border-bottom heading-color text-center">
							<h3>{{trans('general.why')}} {{trans('general.choose_us')}}?</h3>
						</div>
						{!!$about->why_us!!}

					</div>
				</div>
			</div>
		</div>
	</section>

@else
	@include($path . 'comingSoon')
@endif
@endsection