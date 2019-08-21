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

												<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s"><a class="text-white" href="{{$slide->showRoute}}">{{$slide->title}}</a></h1>
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
					<div class="col-md-3 col-sm-3">

						<!-- INLINE SEARCH -->
						<div class="inline-search clearfix mb-30">
							<form action="#" method="get" class="widget_search">
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
								<h4 class="uppercase">{{trans('general.categories')}}</h4>
							</div>
							<ul class="list-group list-group-bordered list-group-noicon uppercase">
								@foreach($categories as $category)
									<li class="list-group-item"><a href="{{$category->showRoute}}"><span class="fs-11 text-muted float-right">({{$category->posts->count()}})</span> {{$category->name}}</a></li>
								@endforeach

							</ul>
							<!-- /side navigation -->

						
						</div>


						<!-- JUSTIFIED TAB -->
						<div class="tabs mt-0 hidden-xs-down mb-60">

							<!-- tabs -->
							<ul class="nav nav-tabs nav-bottom-border nav-justified">
								<li class="nav-item">
									<a class="nav-item active" href="#tab_1" data-toggle="tab">
										{{trans('general.popular')}}
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-item" href="#tab_2" data-toggle="tab">
										{{trans('general.recent')}}
									</a>
								</li>
							</ul>

							<!-- tabs content -->
							<div class="tab-content mb-60 mt-30">

								<!-- POPULAR -->
								<div id="tab_1" class="tab-pane active">

									@foreach($popular as $popularPost)
										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-3">
												<a href="blog-sidebar-left.html">
													<img src="{{$popularPost->thumbnailPath}}" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">{{$popularPost->title}}</a>
												<small>{{$popularPost->created_at->format('M d, Y')}}</small>
											</div>
										</div><!-- /post -->
									@endforeach

								</div>
								<!-- /POPULAR -->


								<!-- RECENT -->
								<div id="tab_2" class="tab-pane">

									@foreach($recent as $recentPost)
										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-3">
												<a href="blog-sidebar-left.html">
													<img src="{{$recentPost->thumbnailPath}}" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">{{$recentPost->title}}</a>
												<small>{{$recentPost->created_at->format('M d, Y')}}</small>
											</div>
										</div><!-- /post -->
									@endforeach
								</div>
								<!-- /RECENT -->

							</div>

						</div>
						<!-- JUSTIFIED TAB -->

						@if($facebook)
						<!-- FACEBOOK -->
							<iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href={{$facebook}}&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>
						@endif
					</div>

					<!-- RIGHT -->
					<div class="col-md-9">

						@include($path . 'partials/posts/posts-list')

						<!-- PAGINATION -->
						<div class="pager">
							{{$posts->links()}}
						</div>
						<!-- /PAGINATION -->

					</div>
					<!-- /RIGHT -->
				</div>

			</div>
		</section>
		<!-- / -->
	@else
		@include($path . 'comingSoon')
	@endif
@endsection

@section('optionalScripts')
	<script src="{{asset('assets/theme-2/plugins/slider.swiper/dist/js/swiper.min.js')}}"></script>
	<script src="{{asset('assets/theme-2/js/view/demo.swiper_slider.js')}}"></script>
@endsection