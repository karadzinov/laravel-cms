@extends('layouts/master')
@section('optionalHead')
	<style>
		.light-gray-bg{
			margin-top: 65px;
		}
		.overlay-container img{
			width: 100%;
		}
		.tp-bannertimer{
			margin-top: 0;
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
										data-endspeed="600"><a href="{{route('posts.show', $slide->id)}}" class="btn btn-default btn-animated">Read More <i class="fa fa-arrow-right"></i></a>
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
						<div class="separator with-icon"><i class="fa fa-pencil bordered"></i></div>
						<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						<br>
						<br>
						<!-- page-title end -->

						<!-- masonry grid start -->
						<!-- ================ -->
						<div class="masonry-grid row">
							@foreach($posts as $post)
								@if($post->video)
									<!-- masonry grid item start -->
									<div class="masonry-grid-item col-sm-6 col-md-4">
										<!-- blogpost start -->
										<article class="blogpost shadow light-gray-bg bordered object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{$post->videoId}}"></iframe>
											</div>
											<header>
												<h2><a href="{{$post->showRoute}}">{!!$post->title!!}</a></h2>
												<div class="post-info">
													<span class="post-date">
														<i class="icon-calendar"></i>
														<span class="day">{{$post->created_at->format('d')}}</span>
														<span class="month">{{$post->created_at->format('M Y')}}</span>
													</span>
													<span class="submitted"><i class="icon-user-1"></i> by <a href="#">{{$post->author->name}}</a></span>
													<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
												</div>
											</header>
											<div class="blogpost-content">
												<p>{!!$post->subtitle!!}</p>
											</div>
											<footer class="clearfix">
												<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
												<div class="link pull-right"><i class="icon-link"></i><a href="{{$post->showRoute}}">Read More</a></div>
											</footer>
										</article>
										<!-- blogpost end -->
									</div>
									<!-- masonry grid item end -->
								@elseif($post->image)
									<!-- masonry grid item start -->
									<div class="masonry-grid-item col-sm-6 col-md-4">
										<!-- blogpost start -->
										<article class="blogpost shadow light-gray-bg bordered">
											<div class="overlay-container">
												<img src="{{$post->thumbnailPath}}" alt="">
												<a class="overlay-link" href="{{$post->showRoute}}"><i class="fa fa-link"></i></a>
											</div>
											<header>
												<h2><a href="{{$post->showRoute}}">{!!$post->title!!}</a></h2>
												<div class="post-info">
													<span class="post-date">
														<i class="icon-calendar"></i>
														<span class="day">{{$post->created_at->format('d')}}</span>
														<span class="month">{{$post->created_at->format('M Y')}}</span>
													</span>
													<span class="submitted"><i class="icon-user-1"></i> by <a href="#">{{$post->author->name}}</a></span>
													<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
												</div>
											</header>
											<div class="blogpost-content">
												<p>{!!$post->subtitle!!}</p>
											</div>
											<footer class="clearfix">
												<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
												<div class="link pull-right"><i class="icon-link"></i><a href="{{$post->showRoute}}">Read More</a></div>
											</footer>
										</article>
										<!-- blogpost end -->
									</div>
									<!-- masonry grid item end -->
								@else
									<!-- masonry grid item start -->
									<div class="masonry-grid-item col-sm-6 col-md-4">
										<!-- blogpost start -->
										<article class="blogpost shadow light-gray-bg bordered object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
											<header>
												<h2><a href="{{$post->showRoute}}">{!!$post->title!!}</a></h2>
												<div class="post-info">
													<span class="post-date">
														<i class="icon-calendar"></i>
														<span class="day">{{$post->created_at->format('d')}}</span>
														<span class="month">{{$post->created_at->format('M Y')}}</span>
													</span>
													<span class="submitted"><i class="icon-user-1"></i> by <a href="#">{{$post->author->name}}</a></span>
													<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
												</div>
											</header>
											<div class="blogpost-content">
												<p>{!!$post->subtitle!!}</p>
											</div>
											<footer class="clearfix">
												<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
												<div class="link pull-right"><i class="icon-link"></i><a href="{{$post->showRoute}}">Read More</a></div>
											</footer>
										</article>
										<!-- blogpost end -->
									</div>
									<!-- masonry grid item end -->
								@endif
							@endforeach
						</div>
						<!-- masonry grid end -->

					</div>
					<!-- main end -->

				</div>
			</div>
		</section>
		<!-- main-container end -->

		<!-- section start -->
		<!-- ================ -->
		<section class="pv-40 light-gray-bg">
			<br>
			<div class="container">
				<div class="row">

					<!-- main start -->
					<!-- ================ -->
					<div class="col-md-8">

						section title start
						<!-- ================ -->
						<h2 class="title">More Posts</h2>
						<div class="separator-2"></div>
						<br>
						<!-- section title end -->

						<!-- blogpost start -->
						<article class="blogpost">
							<div class="row grid-space-10">
								<div class="col-md-6">
									<div id="carousel-blog-post" class="carousel slide" data-ride="carousel">
										<!-- Indicators -->
										<ol class="carousel-indicators bottom margin-clear">
											<li data-target="#carousel-blog-post" data-slide-to="0" class="active"></li>
											<li data-target="#carousel-blog-post" data-slide-to="1"></li>
											<li data-target="#carousel-blog-post" data-slide-to="2"></li>
										</ol>

										<!-- Wrapper for slides -->
										<div class="carousel-inner" role="listbox">
											<div class="item active">
												<div class="overlay-container">
													<img src="{{asset('assets/images/blog-1.jpg')}}" alt="">
													<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
												</div>
											</div>
											<div class="item">
												<div class="overlay-container">
													<img src="{{asset('assets/images/blog-3.jpg')}}" alt="">
													<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
												</div>
											</div>
											<div class="item">
												<div class="overlay-container">
													<img src="{{asset('assets/images/blog-4.jpg')}}" alt="">
													<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<header>
										<h2><a href="blog-post.html">Blogpost with slider</a></h2>
										<div class="post-info">
											<span class="post-date">
												<i class="icon-calendar"></i>
												<span class="day">12</span>
												<span class="month">May 2017</span>
											</span>
											<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
											<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
										</div>
									</header>
									<div class="blogpost-content">
										<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum...</p>
									</div>
								</div>
							</div>
							<footer class="clearfix">
								<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
								<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
							</footer>
						</article>
						<!-- blogpost end -->

						<!-- blogpost start -->
						<article class="blogpost">
							<div class="row grid-space-10">
								<div class="col-md-6">
									<div class="audio-wrapper">
										<iframe height="166" class="margin-clear" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/231321623&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
									</div>
								</div>
								<div class="col-md-6">
									<header>
										<h2><a href="blog-post.html">Audio post</a></h2>
										<div class="post-info">
											<span class="post-date">
												<i class="icon-calendar"></i>
												<span class="day">10</span>
												<span class="month">May 2017</span>
											</span>
											<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
											<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
										</div>
									</header>
									<div class="blogpost-content">
										<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in.</p>
									</div>
								</div>
							</div>
							<footer class="clearfix">
								<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
								<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
							</footer>
						</article>
						<!-- blogpost end -->

						<!-- blogpost start -->
						<article class="blogpost">
							<div class="row grid-space-10">
								<div class="col-md-6">
									<div class="overlay-container">
										<img src="{{asset('assets/images/blog-2.jpg')}}" alt="">
										<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
									</div>
								</div>
								<div class="col-md-6">
									<header>
										<h2><a href="blog-post.html">Cute Robot</a></h2>
										<div class="post-info">
											<span class="post-date">
												<i class="icon-calendar"></i>
												<span class="day">09</span>
												<span class="month">May 2017</span>
											</span>
											<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
											<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
										</div>
									</header>
									<div class="blogpost-content">
										<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum. In iaculis lectus vel augue eleifend dignissim.</p>
									</div>
								</div>
							</div>
							<footer class="clearfix">
								<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
								<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
							</footer>
						</article>
						<!-- blogpost end -->

						<!-- blogpost start -->
						<article class="blogpost">
							<div class="row grid-space-10">
								<div class="col-md-6">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="//www.youtube.com/embed/91J8pLHdDB0"></iframe>
									</div>
								</div>
								<div class="col-md-6">
									<header>
										<h2><a href="blog-post.html">Blogpost with embedded youtube video</a></h2>
										<div class="post-info">
											<span class="post-date">
												<i class="icon-calendar"></i>
												<span class="day">08</span>
												<span class="month">May 2017</span>
											</span>
											<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
											<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
										</div>
									</header>
									<div class="blogpost-content">
										<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in.</p>
									</div>
								</div>
							</div>
							<footer class="clearfix">
								<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
								<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
							</footer>
						</article>
						<!-- blogpost end -->

						<!-- blogpost start -->
						<article class="blogpost">
							<header>
								<h2><a href="blog-post.html">Text Post</a></h2>
								<div class="post-info">
									<span class="post-date">
										<i class="icon-calendar"></i>
										<span class="day">08</span>
										<span class="month">May 2017</span>
									</span>
									<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
									<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
								</div>
							</header>
							<div class="blogpost-content">
								<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum. In iaculis lectus vel augue eleifend dignissim.</p>
							</div>
							<footer class="clearfix">
								<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
								<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
							</footer>
						</article>
						<!-- blogpost end -->

						<!-- pagination start -->
						<nav>
							<ul class="pagination">
								<li><a href="#" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</nav>
						<!-- pagination end -->

					</div>
					<!-- main end -->

					<!-- sidebar start -->
					<!-- ================ -->
					<aside class="col-md-4 col-lg-3 col-lg-offset-1">
						<div class="sidebar">
							<div class="block clearfix">
								<h3 class="title">Sidebar menu</h3>
								<div class="separator-2"></div>
								<nav>
									<ul class="nav nav-pills nav-stacked">
										<li><a href="index.html">Home</a></li>
										<li class="active"><a href="blog-large-image-right-sidebar.html">Blog</a></li>
										<li><a href="portfolio-grid-2-3-col.html">Portfolio</a></li>
										<li><a href="page-about.html">About</a></li>
										<li><a href="page-contact.html">Contact</a></li>
									</ul>
								</nav>
							</div>
							<div class="block clearfix">
								<h3 class="title">Featured Project</h3>
								<div class="separator-2"></div>
								<div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#carousel-portfolio-sidebar" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-portfolio-sidebar" data-slide-to="1"></li>
										<li data-target="#carousel-portfolio-sidebar" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										<div class="item active">
											<div class="image-box shadow bordered text-center mb-20">
												<div class="overlay-container">
													<img src="{{asset('assets/images/portfolio-9.jpg')}}" alt="">
													<a href="portfolio-item.html" class="overlay-link">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="image-box shadow bordered text-center mb-20">
												<div class="overlay-container">
													<img src="{{asset('assets/images/portfolio-1-2.jpg')}}" alt="">
													<a href="portfolio-item.html" class="overlay-link">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="image-box shadow bordered text-center mb-20">
												<div class="overlay-container">
													<img src="{{asset('assets/images/portfolio-1-3.jpg')}}" alt="">
													<a href="portfolio-item.html" class="overlay-link">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="block clearfix">
								<h3 class="title">Latest tweets</h3>
								<div class="separator-2"></div>
								<ul class="tweets">
									<li>
										<i class="fa fa-twitter"></i>
										<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
									</li>
									<li>
										<i class="fa fa-twitter"></i>
										<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
									</li>
								</ul>
							</div>
							<div class="block clearfix">
								<h3 class="title">Popular Tags</h3>
								<div class="separator-2"></div>
								<div class="tags-cloud">
									<div class="tag">
										<a href="#">energy</a>
									</div>
									<div class="tag">
										<a href="#">business</a>
									</div>
									<div class="tag">
										<a href="#">food</a>
									</div>
									<div class="tag">
										<a href="#">fashion</a>
									</div>
									<div class="tag">
										<a href="#">finance</a>
									</div>
									<div class="tag">
										<a href="#">culture</a>
									</div>
									<div class="tag">
										<a href="#">health</a>
									</div>
									<div class="tag">
										<a href="#">sports</a>
									</div>
									<div class="tag">
										<a href="#">life style</a>
									</div>
									<div class="tag">
										<a href="#">books</a>
									</div>
									<div class="tag">
										<a href="#">lorem</a>
									</div>
									<div class="tag">
										<a href="#">ipsum</a>
									</div>
									<div class="tag">
										<a href="#">responsive</a>
									</div>
									<div class="tag">
										<a href="#">style</a>
									</div>
									<div class="tag">
										<a href="#">finance</a>
									</div>
									<div class="tag">
										<a href="#">sports</a>
									</div>
									<div class="tag">
										<a href="#">technology</a>
									</div>
									<div class="tag">
										<a href="#">support</a>
									</div>
									<div class="tag">
										<a href="#">life style</a>
									</div>
									<div class="tag">
										<a href="#">books</a>
									</div>
								</div>
							</div>
							<div class="block clearfix">
								<h3 class="title">Latest News</h3>
								<div class="separator-2"></div>
								<div class="media margin-clear">
									<div class="media-left">
										<div class="overlay-container">
											<img class="media-object" src="{{asset('assets/images/blog-thumb-1.jpg')}}" alt="blog-thumb">
											<a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
										<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 23, 2017</p>
									</div>
									<hr>
								</div>
								<div class="media margin-clear">
									<div class="media-left">
										<div class="overlay-container">
											<img class="media-object" src="{{asset('assets/images/blog-thumb-2.jpg')}}" alt="blog-thumb">
											<a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
										<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 22, 2017</p>
									</div>
									<hr>
								</div>
								<div class="media margin-clear">
									<div class="media-left">
										<div class="overlay-container">
											<img class="media-object" src="{{asset('assets/images/blog-thumb-3.jpg')}}" alt="blog-thumb">
											<a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
										<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 21, 2017</p>
									</div>
									<hr>
								</div>
								<div class="media margin-clear">
									<div class="media-left">
										<div class="overlay-container">
											<img class="media-object" src="{{asset('assets/images/blog-thumb-4.jpg')}}" alt="blog-thumb">
											<a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
										<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 21, 2017</p>
									</div>
								</div>
								<div class="text-right space-top">
									<a href="blog-large-image-right-sidebar.html" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>More</a>
								</div>
							</div>
						</div>
					</aside>
					<!-- sidebar end -->

				</div>
			</div>
		</section>
		<!-- section end -->

		<!-- footer top start -->
		<!-- ================ -->
		<div class="default-bg footer-top animated-text">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="call-to-action text-center">
							<div class="row">
								<div class="col-sm-8">
									<h2>Powerful Bootstrap Template</h2>
									<h2>Waste no more time</h2>
								</div>
								<div class="col-sm-4">
									<p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent ">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="text-center pv-40">
			<p class="lead center">There is no posts on this subject.</p>
		</div>
	@endif
@endsection
