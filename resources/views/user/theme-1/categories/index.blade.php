@extends($path . 'master')
@section('optionalHead')
	<style>
		.categories-image{
			height: 460px;
			width: 100%;
			object-fit: cover;
		}
		.sidebar-image{
			height: 140px;
			width: 100%;
			object-fit: cover;
		}
	</style>
@endsection
@section('content')
	<!-- breadcrumb start -->
	<!-- ================ -->
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-home pr-10"></i>
					<a href="{{route('public.home')}}">
						{{trans('general.navigation.home')}}
					</a>
				</li>
				<li class="active">{{$category->name}}</li>
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
					<p class="lead">{{$category->description}}</p>
					@foreach($posts as $post)
						@if($post->video)
							<!-- blogpost start -->
							<article class="blogpost">
								<div class="embed-responsive embed-responsive-16by9">
									{!!$post->videoPreview!!}
								</div>
								<header>
									<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>
									<div class="post-info">
										<span class="post-date">
											<i class="icon-calendar"></i>
											<span class="day">{{$post->created_at->format('d')}}</span>
											<span class="month">{{$post->created_at->format('M Y')}}</span>
										</span>
										<span class="submitted"><i class="icon-user-1"></i> {{trans('general.by')}} <a href="{{$post->showRoute}}">{{$post->author->name}}</a></span>
										{{-- <span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span> --}}
									</div>
								</header>
								<div class="blogpost-content">
									<p>{{$post->subtitle}}</p>
								</div>
								<footer class="clearfix">
									@if($post->tags->isNotEmpty())
										<div class="tags pull-left">
											@foreach($post->tags as $tag)
												<i class="icon-tags"></i> <a href="{{$tag->showRoute}}">{{$tag->name}}</a>
											@endforeach
										</div>
									@endif
									<div class="link pull-right"><i class="icon-link"></i><a href="{{$post->showRoute}}">{{trans('general.read-more')}}</a></div>
								</footer>
							</article>
							<!-- blogpost end -->
						@elseif($post->image)
							
							<!-- blogpost start -->
							<article class="blogpost">
								<div class="overlay-container">
									<img class="categories-image" src="{{$post->mediumPath}}" alt="">
									<a class="overlay-link" href="{{$post->showRoute}}"><i class="fa fa-link"></i></a>
								</div>
								<header>
									<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>
									<div class="post-info">
										<span class="post-date">
											<i class="icon-calendar"></i>
											<span class="day">{{$post->created_at->format('d')}}</span>
											<span class="month">{{$post->created_at->format('M Y')}}</span>
										</span>
										<span class="submitted"><i class="icon-user-1"></i> {{trans('general.by')}} <a href="#">{{$post->author->name}}</a></span>
										{{-- <span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span> --}}
									</div>
								</header>
								<div class="blogpost-content">
									<p>{{$post->subtitle}}</p>
								</div>
								<footer class="clearfix">
									@if($post->tags->isNotEmpty())
										<div class="tags pull-left">
											@foreach($post->tags as $tag)
												<i class="icon-tags"></i> <a href="{{$tag->showRoute}}">{{$tag->name}}</a>
											@endforeach
										</div>
									@endif
									<div class="link pull-right"><i class="icon-link"></i><a href="{{$post->showRoute}}">{{trans('general.read-more')}}</a></div>
								</footer>
							</article>
							<!-- blogpost end -->
						@else
							<!-- blogpost start -->
							<article class="blogpost">
								<header>
									<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>
									<div class="post-info">
										<span class="post-date">
											<i class="icon-calendar"></i>
											<span class="day">{{$post->created_at->format('d')}}</span>
											<span class="month">{{$post->created_at->format('M Y')}}</span>
										</span>
										<span class="submitted"><i class="icon-user-1"></i> {{trans('general.by')}} <a href="#">{{$post->author->name}}</a></span>
										{{-- <span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span> --}}
									</div>
								</header>
								<div class="blogpost-content">
									<p>{{$post->subtitle}}</p>
								</div>
								<footer class="clearfix">
									@if($post->tags->isNotEmpty())
										<div class="tags pull-left">
											@foreach($post->tags as $tag)
												<i class="icon-tags"></i> <a href="{{$tag->showRoute}}">{{$tag->name}}</a>
											@endforeach
										</div>
									@endif
									<div class="link pull-right"><i class="icon-link"></i><a href="{{$post->showRoute}}">{{trans('general.read-more')}}</a></div>
								</footer>
							</article>
							<!-- blogpost end -->
						@endif
					@endforeach

					


					<!-- pagination start -->
					<nav class="text-center">
						<ul class="pagination">
							{{$posts->links()}}
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
							<h3 class="title">{{trans('general.categories')}}</h3>
							<div class="separator-2"></div>
							<nav>
								<ul class="nav nav-pills nav-stacked">
									@foreach($categories as $category)
										<li><a href="{{$category->showRoute}}">{{$category->name}}</a></li>
									@endforeach
								</ul>
							</nav>
						</div>
						<div class="block clearfix">
							<h3 class="title">{{trans('general.popular')}}</h3>
							<div class="separator-2"></div>
							<div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									@foreach($popular as $popularPost)
										<li data-target="#carousel-portfolio-sidebar" data-slide-to="{{$loop->iteration -1}}" class="@if($loop->iteration === 1) active @endif"></li>
									@endforeach
									{{-- <li data-target="#carousel-portfolio-sidebar" data-slide-to="1"></li>
									<li data-target="#carousel-portfolio-sidebar" data-slide-to="2"></li> --}}
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									@foreach($popular as $popularPost)
										<div class="item @if($loop->iteration == 1) active @endif">
											<div class="image-box shadow bordered text-center mb-20">
												<div class="overlay-container">
													<img class="sidebar-image" src="{{$popularPost->thumbnailPath}}" alt="">
													<a href="{{$popularPost->showRoute}}" class="overlay-link">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
						<div class="block clearfix">
							<h3 class="title">{{trans('general.latest')}}</h3>
							<div class="separator-2"></div>
							<div class="media margin-clear">
								@foreach($recent as $recentPost)
									<div class="media-left">
										<div class="overlay-container">
											<img class="media-object" src="{{$recentPost->thumbnailPath}}" alt="blog-thumb">
											<a href="{{$post->showRoute}}" class="overlay-link small"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><a href="{{$post->showRoute}}">{{$post->title}}</a></h6>
										<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>{{$post->created_at->format('M d, Y')}}</p>
									</div>
									<hr>
								@endforeach
							</div>
							<div class="text-right space-top">
								<a href="{{route('posts.index')}}" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>{{trans('general.more')}}</a>	
							</div>
						</div>
						
						<div class="block clearfix">
							<form role="search" action="{{route('search')}}" method="GET">
								{{csrf_field()}}
								<div class="form-group has-feedback">
									<input name="search" id="sidebar_search" type="text" class="form-control" placeholder="{{trans('general.search')}}">
									<i class="fa fa-search form-control-feedback"></i>
								</div>
								<div id="sidebarSearchResults"></div>
							</form>
						</div>								
					</div>
				</aside>
				<!-- sidebar end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection