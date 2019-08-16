{{-- <div class="masonry-grid row"> --}}
	@foreach($pages as $page)
		@if(count($page->images))
			<!-- masonry grid item start -->
			<div class="masonry-grid-item col-sm-6 col-md-4">
				<!-- blogpost start -->
				<article class="blogpost shadow light-gray-bg bordered">
					<div id="{{$page->slug}}" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators bottom margin-clear">
							@foreach($page->images as $image)
								<li data-target="#{{$page->slug}}" data-slide-to="{{$loop->iteration -1}}" class="active"></li>
							@endforeach
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<div class="overlay-container overlayContainerImages">
									<img src="{{$page->thumbnailPath . $page->images()->first()->name}}" alt="">
									<a class="overlay-link" href="{{$page->showRoute}}"><i class="fa fa-link"></i></a>
								</div>
							</div>
							@php
								$page->images->shift();
							@endphp
							@foreach($page->images as $image)
								<div class="item">
									<div class="overlay-container overlayContainerImages">
										<img src="{{$page->thumbnailPath . $image->name}}" alt="">
										<a class="overlay-link" href="{{$page->showRoute}}"><i class="fa fa-link"></i></a>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<header>
						<h2><a href="{{$page->showRoute}}">{!!$page->title!!}</a></h2>
						<div class="post-info">
							<span class="post-date">
								<i class="icon-calendar"></i>
								<span class="day">{{$page->created_at->format('d')}}</span>
								<span class="month">{{$page->created_at->format('M Y')}}</span>
							</span>
						</div>
					</header>
					<div class="blogpost-content">
						{!!$page->subtitle!!}
					</div>
					<footer class="clearfix">
						<div class="link pull-right"><i class="icon-link"></i><a href="{{$page->showRoute}}">{{trans('general.read_more')}}</a></div>
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
						<h2><a href="{{$page->showRoute}}">{!!$page->title!!}</a></h2>
						<div class="post-info">
							<span class="post-date">
								<i class="icon-calendar"></i>
								<span class="day">{{$page->created_at->format('d')}}</span>
								<span class="month">{{$page->created_at->format('M Y')}}</span>
							</span>
						</div>
					</header>
					<div class="blogpost-content">
						{!!$page->subtitle!!}
					</div>
					<footer class="clearfix">
						<div class="link pull-right"><i class="icon-link"></i><a href="{{$page->showRoute}}">{{trans('general.read_more')}}</a></div>
					</footer>
				</article>
				<!-- blogpost end -->
			</div>
			<!-- masonry grid item end -->
		@endif
	@endforeach
{{-- </div> --}}