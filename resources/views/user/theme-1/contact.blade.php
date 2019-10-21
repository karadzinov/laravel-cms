@extends($path . 'master')

@section('content')
	<div id="collapseMap" class="banner">
		<!-- google map start -->
		<!-- ================ -->
		<div id="map-canvas"></div>
		<!-- google maps end -->
	</div>
	<!-- banner end -->

	<!-- breadcrumb start -->
	<!-- ================ -->
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li><i class="fa fa-home pr-10"></i><a class="link-dark" href="{{route('public.home')}}">{{trans('general.home')}}</a></li>
				<li class="active">{{trans('general.navigation.contact')}}</li>
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
				<div class="main col-md-8">
					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{{trans('general.contact_us')}}</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->
					<p>{{trans('general.contact_top_text')}}</p>
					<div class="alert alert-success hidden" id="MessageSent">
						{{trans('general.soon_response')}}
					</div>
					<div class="alert alert-danger hidden" id="MessageNotSent">
						{{trans('general.error_message')}}
					</div>
					<div class="contact-form">
						<form id="contact-form" class="margin-clear" role="form">
							<div class="form-group has-feedback">
								<label for="name">{{trans('general.name')}}*</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="">
								<i class="fa fa-user form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label for="email">{{trans('general.email')}}*</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="">
								<i class="fa fa-envelope form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label for="subject">{{trans('general.subject')}}*</label>
								<input type="text" class="form-control" id="subject" name="subject" placeholder="">
								<i class="fa fa-navicon form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label for="message">{{trans('general.message')}}*</label>
								<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
								<i class="fa fa-pencil form-control-feedback"></i>
							</div>
							<div class="g-recaptcha" data-sitekey="your_site_key"></div>
							<input type="submit" value="{{trans('general.submit')}}" class="submit-button btn btn-default">
						</form>
					</div>
				</div>
				<!-- main end -->

				<!-- sidebar start -->
				<!-- ================ -->
				<aside class="col-md-4 col-lg-3 col-lg-offset-1">
					<div class="sidebar">
						<p>
							{{trans('general.if-questions')}}
						</p>
						<div class="block clearfix">
							<h3 class="title">{{trans('general.find_us')}}</h3>
							<div class="separator-2"></div>
							<ul class="list">
								<li>
									<i class="fa fa-home pr-10"></i>
									{{$settings->address}}
								</li>
								<li>
									<i class="fa fa-phone pr-10"></i>
									{{$settings->phone_number}}
								</li>
								<li>
									<i class="fa fa-envelope pr-10"></i>
									<a href="mailto:{{$settings->email}}">
										{{$settings->email}}
									</a>
								</li>
							</ul>
							<a class="btn btn-gray collapsed map-show btn-animated" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">{{trans('general.show_map')}} <i class="fa fa-plus"></i></a>
						</div>
					</div>
					<div class="sidebar">
						<div class="block clearfix">
							<h2 class="title">{{trans('general.follow_us')}}</h2>
							<div class="separator-2"></div>
							<ul class="social-links circle small margin-clear clearfix animated-effect-1">
								<li class="twitter"><a target="_blank" href="//{{$settings->twitter}}"><i class="fa fa-twitter"></i></a></li>
								<li class="linkedin"><a target="_blank" href="//{{$settings->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
								<li class="facebook"><a target="_blank" href="//{{$settings->facebook}}"><i class="fa fa-facebook"></i></a></li>
								<li class="instagram"><a target="_blank" href="//{{$settings->instagram}}"><i class="fa fa-instagram"></i></a></li>
								<li class="ios"><a target="_blank" href="//{{$settings->ios_app}}"><i class="fa fa-apple"></i></a></li>
								<li class="android"><a target="_blank" href="//{{$settings->android_app}}"><i class="fa fa-android"></i></a></li>
							</ul>
						</div>
					</div>
				</aside>
				<!-- sidebar end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection