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
		.post-with-image{
			max-height: 500px;
			object-fit: cover;
			widows: 100%;
		}
	</style>
@endsection

@section('content')
	<section class="page-header dark page-header-xs">
		<div class="container">

			<h1 class="uppercase">{{$category->name}}</h1>

			<!-- breadcrumbs -->
			<ol class="breadcrumb">
				<li><a href="/home">{{trans('general.home')}}</a></li>
				<li><a href="{{$category->showRoute}}">{{trans('general.categories')}}</a></li>
				<li class="active">{{$category->name}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->




	<!-- -->
	<section>
		<div class="container">

			<div class="row">

				<!-- LEFT -->
				<div class="col-md-9 col-sm-9">
					<!-- POST ITEM -->
					@foreach($posts as $post)
						<div class="blog-post-item">
							@if($post->video)
								<!-- VIDEO -->
								<div class="mb-20">
									<div class="embed-responsive embed-responsive-16by9">
										{!!$post->videoPreview!!}
									</div>
								</div>
							@elseif($post->image)
								<!-- IMAGE -->
								<figure class="mb-20">
									<img class="img-fluid post-with-image" src="{{$post->mediumPath}}" alt="">
								</figure>
							@endif
							<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>

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

									<a class="category" href="#">
										<span class="font-lato">{{$post->category->name}}</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-user"></i> 
										<span class="font-lato">{{$post->author->name}}</span>
									</a>
								</li>
							</ul>

							<p>{{$post->subtitle}}</p>

							<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
								<i class="fa fa-plus"></i>
								<span>{{trans('general.read-more')}}</span>
							</a>

						</div>
					@endforeach
					<!-- /POST ITEM -->

					<!-- PAGINATION -->
					<div class="pager">
						{{$posts->links()}}
					</div>
					<!-- /PAGINATION -->

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
											<a href="{{$popularPost->showPage}}">
												<img src="{{$popularPost->thumbnailPath}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="{{$popularPost->showPage}}" class="tab-post-link">{{$popularPost->title}}</a>
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
											<a href="{{$recentPost->showPage}}">
												<img src="{{$recentPost->thumbnailPath}}" width="50" alt="" />
											</a>
										</div>
										<div class="col-md-9 col-sm-9 col-9">
											<a href="{{$recentPost->showPage}}" class="tab-post-link">{{$recentPost->title}}</a>
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

			</div>

		</div>
	</section>
@endsection