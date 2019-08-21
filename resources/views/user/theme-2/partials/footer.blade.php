<!-- FOOTER -->
<footer id="footer">
	<div class="container">

		<div class="row">
			
			<div class="col-md-3">
				<!-- Footer Logo -->
				<img class="footer-logo" src="{{asset('assets/theme-2/images/_smarty/logo-footer.png')}}" alt="" />

				<!-- Short Description -->
				<p>{{$settings->slogan}}</p>

				<!-- Contact Address -->
				<address>
					<ul class="list-unstyled">
						<li class="footer-sprite address">
							{{$settings->address}}
						</li>
						<li class="footer-sprite phone">
							{{trans('general.phone')}}: {{$settings->phone}}
						</li>
						<li class="footer-sprite email">
							<a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
						</li>
					</ul>
				</address>
				<!-- /Contact Address -->

			</div>

			<div class="col-md-3">

				<!-- Latest Blog Posts -->
				<h4 class="letter-spacing-1 uppercase">{{trans('general.latest-posts')}}</h4>
				<ul class="footer-posts list-unstyled">
					@foreach($posts->take(3) as $post)
						<li>
							<a href="{{$post->showRoute}}">{{$post->title}}</a>
							<small>{{$post->created_at->format('M d, Y')}}</small>
						</li>
					@endforeach
				</ul>
				<!-- /Latest Blog Posts -->

			</div>

			<div class="col-md-2">

				<!-- Links -->
				<h4 class="letter-spacing-1 uppercase">{{trans('general.explore') . ' ' . $settings->title}} </h4>
				<ul class="footer-links list-unstyled">
					<li>
						<a href="{{route('public.home')}}">
							{{trans('general.navigation.home')}}
						</a>
					</li>
					<li>
						<a href="{{route('about')}}">
							{{trans('general.navigation.about')}}
						</a>
					</li>
					<li>
						<a href="{{route('pages.index')}}">
							{{trans('general.navigation.pages')}}
						</a>
					</li>
					<li>
						<a href="{{route('posts.index')}}">
							{{trans('general.navigation.posts')}}
						</a>
					</li>
					<li>
						<a href="{{route('contact')}}">
							{{trans('general.navigation.contact')}}
						</a>
					</li>
					<li>
						<a href="{{route('faq.index')}}">
							{{trans('general.navigation.faq')}}
						</a>
					</li>
				</ul>
				<!-- /Links -->

			</div>

			<div class="col-md-4">

				
				<h4 class="letter-spacing-1 uppercase">{{trans('general.follow_us')}}</h4>
				<p>{{trans('general.follow-us-on')}}</p>

				<!-- Social Icons -->
				<div class="mt-20">

					<a href="//{{$settings->facebook}}" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="{{trans('general.facebook')}}">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="//{{$settings->facebook}}" class="social-icon social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="{{trans('general.twitter')}}">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="//{{$settings->instagram}}" class="social-icon social-icon-border social-instagram float-left" data-toggle="tooltip" data-placement="top" title="{{trans('general.instagram')}}">
						<i class="icon-instagram"></i>
						<i class="icon-instagram"></i>
					</a>

					<a href="//{{$settings->linkedin}}" class="social-icon social-icon-border social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="{{trans('general.linkedin')}}">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>

					<a href="{{route('feed')}}" class="social-icon social-icon-border social-rss float-left" data-toggle="tooltip" data-placement="top" title="{{trans('general.rss')}}">
						<i class="icon-rss"></i>
						<i class="icon-rss"></i>
					</a>
		
				</div>
				<!-- /Social Icons -->
				<br>
				<br>
				<br>
				<form action="".box-shadow- method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="text" id="text" name="search" class="form-control" placeholder="{{trans('general.search')}}" required="required">
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit">{{trans('general.search')}}</button>
						</span>
					</div>
				</form>
			</div>

		</div>

	</div>

	<div class="copyright">
		<div class="container">
			<ul class="float-right m-0 list-inline mobile-block">
				<li><a href="#">Terms & Conditions</a></li>
				<li>&bull;</li>
				<li><a href="#">Privacy</a></li>
			</ul>
			&copy; All Rights Reserved, {{$settings->title}}
		</div>
	</div>
</footer>
<!-- /FOOTER -->
<input type="hidden" id="lat" class="form-control" name="lat" value="{{ $settings->lat }}">
<input type="hidden" id="lng" class="form-control" name="lng" value="{{ $settings->lng }}">