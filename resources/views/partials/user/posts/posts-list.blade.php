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