<!-- header-top start -->
<!-- classes:  -->
<!-- "dark": dark version of header top e.g. class="header-top dark" -->
<!-- "colored": colored version of header top e.g. class="header-top colored" -->
<!-- ================ -->
<div class="header-top dark ">
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-6 col-md-9">
				<!-- header-top-first start -->
				<!-- ================ -->
				<div class="header-top-first clearfix">
					<ul class="social-links circle small clearfix hidden-xs">
						<li class="facebook"><a target="_blank" href="//{{$settings->facebook}}"><i class="fa fa-facebook"></i></a></li>
						<li class="instagram"><a target="_blank" href="//{{$settings->instagram}}"><i class="fa fa-instagram"></i></a></li>
						<li class="twitter"><a target="_blank" href="//{{$settings->twitter}}"><i class="fa fa-twitter"></i></a></li>
						<li class="linkedin"><a target="_blank" href="//{{$settings->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
						<li class="ios"><a target="_blank" href="//{{$settings->ios_app}}"><i class="fa fa-apple"></i></a></li>
						<li class="android"><a target="_blank" href="//{{$settings->android_app}}"><i class="fa fa-android"></i></a></li>
					</ul>
					<div class="social-links hidden-lg hidden-md hidden-sm circle small">
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
							<ul class="dropdown-menu dropdown-animation">
								<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
								<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
								<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
								<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
								<li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
								<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
								<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
					<ul class="list-inline hidden-sm hidden-xs">
						<li><i class="fa fa-map-marker pr-5 pl-10"></i>{{$settings->address}}</li>
						<li>
							<i class="fa fa-phone pr-5 pl-10"></i>
							{{$settings->phone_number}}
						</li>
						<li>
							<i class="fa fa-envelope-o pr-5 pl-10"></i> 
							<a class="headerMail" href="mailto:{{$settings->email}}">
								{{$settings->email}}
							</a>
						</li>
					</ul>
				</div>
				<!-- header-top-first end -->
			</div>
			<div class="col-xs-9 col-sm-6 col-md-3">

				<!-- header-top-second start -->
				<!-- ================ -->
				<div id="header-top-second"  class="clearfix">
					<!-- header top dropdowns start -->
					<!-- ================ -->
					<div class="header-top-dropdown text-right">
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"><i class="fa fa-lock pr-10"></i> {{trans('general.header.logout')}}</button>
							<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
								<li>
									<a class="btn btn-default" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{trans('general.header.logout')}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>
							</ul>
						</div>
					</div>
					<!--  header top dropdowns end -->
				</div>
				<!-- header-top-second end -->
			</div>
		</div>
	</div>
</div>
<!-- header-top end -->