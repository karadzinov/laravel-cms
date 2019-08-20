@extends($path . 'master')

@section('optionalHead')
	<!-- SWIE SLIDER -->
		<link href="{{asset('assets/theme-2/plugins/slider.swiper/dist/css/swiper.min.css')}}" rel="stylesheet" type="text/css" />
		<style>
			.post-with-image{
				max-height: 500px;
				object-fit: cover;
				widows: 100%;
			}
		</style>
@endsection

@section('content')
	@if($posts->isNotEmpty())
		<!-- 
			FIXED HEIGHT CLASSES
			
			h-300
			h-350
			h-400
			h-450
			h-500
			h-550
			h-600
			h-650
			h-700
			h-750
			h-800
		-->
		<section id="slider" class="h-800">

			<!--
				SWIPPER SLIDER PARAMS
				
				data-effect="slide|fade|coverflow"
				data-autoplay="2500|false"
			-->
			<div class="swiper-container" data-effect="coverflow" data-autoplay="4000">
				<div class="swiper-wrapper">

					<!-- SLIDES -->
					@foreach($slider as $slide)
						<div class="swiper-slide" style="background-image: url('{{$slide->originalPath}}');">
							<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>
							
							<div class="display-table">
								<div class="display-table-cell vertical-align-middle">
									<div class="container">

										<div class="row">
											<div class="text-center col-md-8 col-12 offset-md-2">

												<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">{{$slide->title}}</h1>
												<p class="lead font-lato fw-300 hidden-xs-down wow fadeInUp" data-wow-delay="0.6s">{{$slide->subtitle}}</p>

											</div>
										</div>
							
									</div>
								</div>
							</div>
							
						</div>
					@endforeach
					<!-- /SLIDES -->
				</div>

				<!-- Swiper Pagination -->
				<div class="swiper-pagination"></div>

				<!-- Swiper Arrows -->
				<div class="swiper-button-next"><i class="icon-angle-right"></i></div>
				<div class="swiper-button-prev"><i class="icon-angle-left"></i></div>
			</div>
				
		</section>
		<!-- /SLIDER -->



		<!-- BUTTON CALLOUT -->
		<a href="#" class="btn btn-xlg btn-teal fs-20 fullwidth m-0 rad-0 p-40">
			<span class="font-lato fs-30">
				Did Smarty convinced you? 
				<strong>Contact us &raquo;</strong>
			</span>
		</a>
		<!-- /BUTTON CALLOUT -->



		<!-- -->
		<section>
			<div class="container">

				<div class="row">

					<!-- LEFT -->
					<div class="col-md-3">

						<!-- INLINE SEARCH -->
						<div class="inline-search clearfix mb-30">
							<form action="" method="get" class="widget_search">
								<input type="search" placeholder="Start Searching..." id="s" name="s" class="serch-input">
								<button type="submit">
									<i class="fa fa-search"></i>
								</button>
							</form>
						</div>
						<!-- /INLINE SEARCH -->

						<hr />

						<!-- side navigation -->
						<div class="side-nav mb-60 mt-30">

							<div class="side-nav-head">
								<button class="fa fa-bars"></button>
								<h4>CATEGORIES</h4>
							</div>
							<ul class="list-group list-group-bordered list-group-noicon uppercase">
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(12)</span> MEDIA</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(8)</span> MOVIES</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(32)</span> NEW</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(16)</span> TUTORIALS</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(2)</span> DEVELOPMENT</a></li>
								<li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(1)</span> UNCATEGORIZED</a></li>

							</ul>
							<!-- /side navigation -->

						
						</div>


						<!-- JUSTIFIED TAB -->
						<div class="tabs mt-0 hidden-xs-down mb-60">

							<!-- tabs -->
							<ul class="nav nav-tabs nav-bottom-border nav-justified">
								<li class="nav-item">
									<a class="nav-item active" href="#tab_1" data-toggle="tab">
										Popular
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-item" href="#tab_2" data-toggle="tab">
										Recent
									</a>
								</li>
							</ul>

							<!-- tabs content -->
							<div class="tab-content mb-60 mt-30">

								<!-- POPULAR -->
								<div id="tab_1" class="tab-pane active">

									<div class="row tab-post"><!-- post -->
										<div class="col-md-3 col-sm-3 col-3">
											<a href="blog-sidebar-left.html">
												<img src="{{asset('assets/theme-2/demo_files/images/people/300x300/1-min.jpg')}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="blog-sidebar-left.html" class="tab-post-link">Maecenas metus nulla</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post"><!-- post -->
										<div class="col-md-3 col-sm-3 col-3">
											<a href="blog-sidebar-left.html">
												<img src="{{asset('assets/theme-2/demo_files/images/people/300x300/2-min.jpg')}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="blog-sidebar-left.html" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post"><!-- post -->
										<div class="col-md-3 col-sm-3 col-3">
											<a href="blog-sidebar-left.html">
												<img src="{{asset('assets/theme-2/demo_files/images/people/300x300/3-min.jpg')}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="blog-sidebar-left.html" class="tab-post-link">Nam et lacus neque. Ut enim massa, sodales</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

								</div>
								<!-- /POPULAR -->


								<!-- RECENT -->
								<div id="tab_2" class="tab-pane">

									<div class="row tab-post"><!-- post -->
										<div class="col-md-3 col-sm-3 col-3">
											<a href="blog-sidebar-left.html">
												<img src="{{asset('assets/theme-2/demo_files/images/people/300x300/4-min.jpg')}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="blog-sidebar-left.html" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post"><!-- post -->
										<div class="col-md-3 col-sm-3 col-3">
											<a href="blog-sidebar-left.html">
												<img src="{{asset('assets/theme-2/demo_files/images/people/300x300/5-min.jpg')}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="blog-sidebar-left.html" class="tab-post-link">Maecenas metus nulla</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->

									<div class="row tab-post"><!-- post -->
										<div class="col-md-3 col-sm-3 col-3">
											<a href="blog-sidebar-left.html">
												<img src="{{asset('assets/theme-2/demo_files/images/people/300x300/6-min.jpg')}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="blog-sidebar-left.html" class="tab-post-link">Quisque ut nulla at nunc</a>
											<small>June 29 2014</small>
										</div>
									</div><!-- /post -->
								</div>
								<!-- /RECENT -->

							</div>

						</div>
						<!-- JUSTIFIED TAB -->


						<!-- TAGS -->
						<h3 class="hidden-xs-down fs-16 mb-20">TAGS</h3>
						<div class="hidden-xs-down mb-60">

							<a class="tag" href="#">
								<span class="txt">RESPONSIVE</span>
								<span class="num">12</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">CSS</span>
								<span class="num">3</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">HTML</span>
								<span class="num">1</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">JAVASCRIPT</span>
								<span class="num">28</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">DESIGN</span>
								<span class="num">6</span>
							</a>
							<a class="tag" href="#">
								<span class="txt">DEVELOPMENT</span>
								<span class="num">3</span>
							</a>
						</div>


						<!-- TWIITER WIDGET -->
						<h3 class="hidden-xs-down fs-16 mb-10">TWITTER FEED</h3>							
						<ul class="hidden-xs-down widget-twitter mb-60" data-php="php/twitter/tweet.php" data-username="stepofweb" data-limit="3">
							<li></li>
						</ul>

						<!-- FEATURED VIDEO -->
						<h3 class="hidden-xs-down fs-16 mb-10">FEATURED VIDEO</h3>
						<div class="hidden-xs-down embed-responsive embed-responsive-16by9 mb-60">
							<iframe class="embed-responsive-item" src="//player.vimeo.com/video/8408210" width="800" height="450"></iframe>
						</div>

						<!-- FLICKR WIDGET -->
						<h3 class="hidden-xs-down fs-16 mb-10">FLICKR PHOTO</h3>
						<div class="hidden-xs-down widget-flickr clearfix lightbox mb-60" data-id="37304598@N02" data-limit="16" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'></div>


						<!-- FACEBOOK -->
						<iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fstepofweb&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>


						<hr />


						<!-- SOCIAL ICONS -->
						<div class="hidden-xs-down mt-30 mb-60">
							<a href="#" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon social-icon-border social-gplus float-left" data-toggle="tooltip" data-placement="top" title="Google plus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon social-icon-border social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>

							<a href="#" class="social-icon social-icon-border social-rss float-left" data-toggle="tooltip" data-placement="top" title="Rss">
								<i class="icon-rss"></i>
								<i class="icon-rss"></i>
							</a>
						</div>

					</div>

					<!-- RIGHT -->
					<div class="col-md-9">

						@include($path . 'partials/posts/posts-list')


						<!-- PAGINATION -->
						<ul class="pager">
						  <li class="previous"><a class="radius-0" href="#">&larr; Older</a></li>
						  <li class="next"><a class="radius-0" href="#">Newer &rarr;</a></li>
						</ul>
						<!-- /PAGINATION -->

					</div>

				</div>


			</div>
		</section>
		<!-- / -->
	@else
		here
	@endif
@endsection

@section('optionalScripts')
	<script src="{{asset('assets/theme-2/plugins/slider.swiper/dist/js/swiper.min.js')}}"></script>
	<script src="{{asset('assets/theme-2/js/view/demo.swiper_slider.js')}}"></script>
@endsection