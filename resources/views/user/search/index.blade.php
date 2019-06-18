@extends('layouts/master')
@section('optionalHead')
	<style>
		.overlay-container{
			height: 200px;
		}
	</style>
@endsection
@section('content')

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-10">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">Search results for "{{$search}}"</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ut quisquam ab harum hic enim quibusdam aut quasi recusandae temporibus quo voluptatibus, dolorem consectetur ipsam facere ipsa. Commodi sunt, inventore!</p>
					@if(!count($posts) && !count($pages) && !count($faqs))
						<p class="lead">No results for "{{$search}}"</p>
					@else
						<!-- Nav tabs -->
						<ul class="nav nav-tabs style-1" role="tablist">
							@if(count($posts))
								<li><a href="#tab1" role="tab" data-toggle="tab"><i class="fa  fa-pencil pr-10"></i>Posts</a></li>
							@endif
							@if(count($pages))
								<li><a href="#tab2" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o"></i> Pages</a></li>
							@endif
							@if(count($faqs))
								<li><a href="#tab3" role="tab" data-toggle="tab"><i class="fa fa-question pr-10"></i>Faqs</a></li>
							@endif
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							@if(count($posts))
								<div class="tab-pane fade" id="tab1">
									@include('partials/user/posts/posts-list')
								</div>
							@endif
							@if(count($pages))
								<div class="tab-pane fade" id="tab2">
									{{-- <div class="masonry-grid row"> --}}
										@foreach($pages as $page)
											@if(count($page->images))
												<!-- masonry grid item start -->
												<div class="masonry-grid-item col-sm-6 col-md-4">
													<!-- blogpost start -->
													<article class="blogpost shadow light-gray-bg bordered">
														<div id="carousel-blog-post" class="carousel slide" data-ride="carousel">
															<!-- Indicators -->
															<ol class="carousel-indicators bottom margin-clear">
																@foreach($page->images as $iamge)
																	<li data-target="#carousel-blog-post" data-slide-to="{{$loop->iteration -1}}" class="active"></li>
																@endforeach
															</ol>
															<!-- Wrapper for slides -->
															<div class="carousel-inner" role="listbox">
																<div class="item active">
																	<div class="overlay-container">
																		<img src="{{$page->thumbnailPath . $page->images()->first()->name}}" alt="">
																		<a class="overlay-link" href="{{$page->showRoute}}"><i class="fa fa-link"></i></a>
																	</div>
																</div>
																@php
																	$page->images->shift();
																@endphp
																@foreach($page->images as $image)
																	<div class="item">
																		<div class="overlay-container">
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
															<div class="link pull-right"><i class="icon-link"></i><a href="{{$page->showRoute}}">Read More</a></div>
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
															<div class="link pull-right"><i class="icon-link"></i><a href="{{$page->showRoute}}">Read More</a></div>
														</footer>
													</article>
													<!-- blogpost end -->
												</div>
												<!-- masonry grid item end -->
											@endif
										@endforeach
									{{-- </div> --}}
								</div>
							@endif
							@if(count($faqs))
								<div class="tab-pane fade" id="tab3">
									<!-- accordion start -->
									<div class="panel-group collapse-style-1" id="accordion-faq-3">
										@foreach($faqs as $faq)
											@include('partials/user/faqs/item')
										@endforeach
									</div>
									<!-- accordion end -->
								</div>
							@endif
						</div>
					@endif
				</div>
				<!-- main end -->
			</div>
		</div>
	</section>

@endsection

@section('optionalScripts')
	<script>
		$('.tab-content div:first-child').addClass('in active');
		$('.nav-tabs li:first-child').addClass('active');
	</script>
@endsection