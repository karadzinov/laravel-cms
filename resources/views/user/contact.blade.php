@extends('layouts/master')

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
				<li><i class="fa fa-home pr-10"></i><a class="link-dark" href="{{route('public.home')}}">Home</a></li>
				<li class="active">Contact</li>
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
					<h1 class="page-title">Contact Us</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->
					<p>It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!</p>
					<div class="alert alert-success hidden" id="MessageSent">
						We have received your message, we will contact you very soon.
					</div>
					<div class="alert alert-danger hidden" id="MessageNotSent">
						Oops! Something went wrong, please verify that you are not a robot or refresh the page and try again.
					</div>
					<div class="contact-form">
						<form id="contact-form" class="margin-clear" role="form">
							<div class="form-group has-feedback">
								<label for="name">Name*</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="">
								<i class="fa fa-user form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label for="email">Email*</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="">
								<i class="fa fa-envelope form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label for="subject">Subject*</label>
								<input type="text" class="form-control" id="subject" name="subject" placeholder="">
								<i class="fa fa-navicon form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label for="message">Message*</label>
								<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
								<i class="fa fa-pencil form-control-feedback"></i>
							</div>
							<div class="g-recaptcha" data-sitekey="your_site_key"></div>
							<input type="submit" value="Submit" class="submit-button btn btn-default">
						</form>
					</div>
				</div>
				<!-- main end -->

				<!-- sidebar start -->
				<!-- ================ -->
				<aside class="col-md-4 col-lg-3 col-lg-offset-1">
					<div class="sidebar">
						<div class="block clearfix">
							<h3 class="title">Find Us</h3>
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
							<a class="btn btn-gray collapsed map-show btn-animated" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">Show Map <i class="fa fa-plus"></i></a>
						</div>
					</div>
					<div class="sidebar">
						<div class="block clearfix">
							<h2 class="title">Follow Us</h2>
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