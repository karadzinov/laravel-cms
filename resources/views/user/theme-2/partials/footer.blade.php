{{-- <hr> --}}
<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
<!-- ================ -->
<footer id="footer" class="clearfix dark">

	<!-- .footer start -->
	<!-- ================ -->
	<div class="footer">
		<div class="container">
			<div class="footer-inner">
				<div class="row">
					<div class="col-md-3">
						<div class="footer-content">
							<div class="logo-footer"><img class="logo_image" id="logo-footer" src="{{asset('images/settings/thumbnails/'.$settings->logo)}}" alt="Logo"></div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Ipsa, aut voluptas quaerat... 
								<a href="#">
									{{trans('general.learn_more')}}
									<i class="fa fa-long-arrow-right pl-5"></i>
								</a>
							</p>
							<div class="separator-2"></div>
							<nav>
								<ul class="nav nav-pills nav-stacked">
									<li><a target="_blank" href="#">{{trans('general.footer.support')}}</a></li>
									<li><a href="#">{{trans('general.footer.privacy')}}</a></li>
									<li><a href="#">{{trans('general.footer.terms')}}</a></li>
									<li><a href="{{route('about')}}">{{trans('general.footer.about')}}</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-content">
							<h2 class="title">{{trans('general.footer.latest_from_blog')}}</h2>
							<div class="separator-2"></div>
							@foreach($posts as $post)
								<div class="media margin-clear">
									<div class="media-left">
										<div class="overlay-container">
											<img class="media-object" src="{{$post->thumbnailPath}}" alt="{{$post->title}}">
											<a href="{{$post->showRoute}}" class="overlay-link small"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><a href="{{$post->showRoute}}">{{substr($post->title, 0, 30) }}...</a></h6>
										<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>{{$post->created_at->format('M d, Y')}}</p>
									</div>
									<hr>
								</div>
							@endforeach
							<div class="text-right space-top">
								<a href="{{route('posts.index')}}" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>{{trans('general.more')}}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-content">
							<h2 class="title">{{trans('general.footer.gallery')}}</h2>
							<div class="separator-2"></div>
							<div class="row grid-space-10">
								@foreach($images as $image)
									<div class="col-xs-4 col-md-6 footerImages">
										<div class="overlay-container mb-10">
											<img src="{{asset('images/pages/thumbnails/' . $image->name)}}" alt="">
											<a href="{{route('pages.index')}}" class="overlay-link small">
												<i class="fa fa-link"></i>
											</a>
										</div>
									</div>
								@endforeach
							</div>
							<div class="text-right space-top">
								<a href="{{route('pages.index')}}" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>{{trans('general.more')}}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-content">
							<h2 class="title">{{trans('general.find_us')}}</h2>
							<div class="separator-2"></div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<ul class="social-links circle animated-effect-1">
								<li class="facebook"><a target="_blank" href="{{$settings->facebook}}"><i class="fa fa-facebook"></i></a></li>
								<li class="instagram"><a target="_blank" href="{{$settings->instagram}}"><i class="fa fa-instagram"></i></a></li>
								<li class="twitter"><a target="_blank" href="{{$settings->twitter}}"><i class="fa fa-twitter"></i></a></li>
								<li class="linkedin"><a target="_blank" href="{{$settings->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
								<li class="ios"><a target="_blank" href="{{$settings->ios_app}}"><i class="fa fa-apple"></i></a></li>
								<li class="android"><a target="_blank" href="{{$settings->android_app}}"><i class="fa fa-android"></i></a></li>
							</ul>
							<div id="mapCanvasSeparator" class="separator-2"></div>
							<ul class="list-icons">
								<li><i class="fa fa-map-marker pr-10 text-default"></i> {{$settings->address}}</li>
								<li>
                                <div id="map-canvas"></div>
									
								</li>
								<li><i class="fa fa-phone pr-10 text-default"></i> {{$settings->phone_number}}</li>
								<li><a href="mailto:info@theproject.com"><i class="fa fa-envelope-o pr-10"></i>{{$settings->email}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- .footer end -->

	<!-- .subfooter start -->
	<!-- ================ -->
	<div class="subfooter">
		<div class="container">
			<div class="subfooter-inner">
				<div class="row">
					<div class="col-md-12">
						<p class="text-center">Copyright © {{now()->format('Y')}} The Project by <a target="_blank" href="https://sentice.com/">Sentice</a>. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- .subfooter end -->
	<input type="hidden" id="lat" class="form-control" name="lat" value="{{ $settings->lat }}">
	<input type="hidden" id="lng" class="form-control" name="lng" value="{{ $settings->lng }}">
</footer>
<!-- footer end -->