@extends($path . 'master')

@section('optionalHead')
	<style>
		#header.translucent + section.page-header{
			margin-top: 0;
			margin-bottom: 0;
			padding: 20px 0 20px 0;
		}
		#header.translucent{
			position: relative;
		}
		body.grain-grey section.page-header{
		    color: #fff;
		    background-color: #151515 !important;
		}
	</style>
@endsection

@section('content')
	
	<section class="page-header dark page-header-xs">
		<div class="container">

			<h1 class="uppercase">{{trans('general.navigation.posts')}}</h1>

			<!-- breadcrumbs -->
			<ol class="breadcrumb">
				<li><a href="/home">{{trans('general.home')}}</a></li>
				<li><a href="{{route('posts.index')}}">{{trans('general.navigation.posts')}}</a></li>
				<li class="active">{{$post->title}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>

	<section>
		<div class="container">

			<div class="row">

				<!-- LEFT -->
				<div class="col-md-9 col-sm-9">

					<h1 class="blog-post-title">{{$post->title}}</h1>
					<ul class="blog-post-info list-inline">
						<li>
							<a href="#">
								<i class="fa fa-clock-o"></i> 
								<span class="font-lato">{{$post->created_at->format('M d, Y')}}</span>
							</a>
						</li>
						@if($post->location)
							<li>
								<a href="#">
									<i class="fa fa-map-marker"></i> 
									<span class="font-lato">{{$post->location}}</span>
								</a>
							</li>
						@endif
						<li>
							<i class="fa fa-folder-open-o"></i> 

							{{$post->category->name}}
						</li>
						<li>
							<a href="#">
								<i class="fa fa-user"></i> 
								<span class="font-lato">{{$post->author->name}}</span>
							</a>
						</li>
					</ul>

					<!-- IMAGE -->
					<figure class="mb-20">
						<img class="img-fluid" src="{{$post->mediumPath}}" alt="img" />
					</figure>
					<!-- /IMAGE -->

					<!-- VIDEO -->
					
					@if($post->videoPreview)
						<div class="mb-20 embed-responsive embed-responsive-16by9">
							{!!$post->videoPreview!!}
						</div>
					@endif
					
					<!-- /VIDEO -->


					<!-- article content -->
					{!!$post->main_text!!}
					<!-- /article content -->


					<div class="divider divider-dotted"><!-- divider --></div>


					<!-- TAGS -->
					@forelse($post->tags as $tag)
						<a class="tag" href="{{$tag->showRoute}}">
							<span class="txt">{{$tag->name}}</span>
							<span class="num">{{$tag->posts->count()}}</span>
						</a>
					@empty
					@endforelse
					<!-- /TAGS -->



					<!-- SHARE POST -->
					<div class="clearfix mt-30">

						<span class="float-left mt-6 bold hidden-xs-down">
							{{trans('general.share')}}
						</span>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook float-right" data-toggle="tooltip" data-placement="top" title="Facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter float-right" data-toggle="tooltip" data-placement="top" title="Twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-gplus float-right" data-toggle="tooltip" data-placement="top" title="Google plus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-linkedin float-right" data-toggle="tooltip" data-placement="top" title="Linkedin">
							<i class="icon-linkedin"></i>
							<i class="icon-linkedin"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-pinterest float-right" data-toggle="tooltip" data-placement="top" title="Pinterest">
							<i class="icon-pinterest"></i>
							<i class="icon-pinterest"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-call float-right" data-toggle="tooltip" data-placement="top" title="Email">
							<i class="icon-email3"></i>
							<i class="icon-email3"></i>
						</a>

					</div>
					<!-- /SHARE POST -->


					<div class="divider"><!-- divider --></div>

					
					<ul class="pager">
						<li class="previous"><a class="b-0" href="#">&larr; Previous Post</a></li>
						<li class="next"><a class="b-0" href="#">Next Post &rarr;</a></li>
					</ul>

				</div>


				<!-- RIGHT -->
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


					
					@if($post->tags->isNotEmpty())
					<h3 class="hidden-xs-down fs-16 mb-20 uppercase">{{trans('general.tags')}}</h3>
						@foreach($post->tags as $tag)
							<!-- TAGS -->
							<div class="hidden-xs-down mb-60">

								<a class="tag" href="{{$tag->showRoute}}">
									<span class="txt">{{$tag->name}}</span>
									<span class="num">{{$tag->posts->count()}}</span>
								</a>
							</div>
						@endforeach
					@endif
					@if($facebook)
					<!-- FACEBOOK -->
						<iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href={{$facebook}}&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>
					@endif
				</div>

			</div>


		</div>
	</section>
	<!-- / -->
@endsection