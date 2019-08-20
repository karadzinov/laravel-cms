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
		.btn{
			margin-top: 40px;
		}
	</style>
@endsection

@section('content')
	
	<!-- 
		PAGE HEADER 
		
		CLASSES:
			.page-header-xs	= 20px margins
			.page-header-md	= 50px margins
			.page-header-lg	= 80px margins
			.page-header-xlg= 130px margins
			.dark			= dark page header

			.shadow-before-1 	= shadow 1 header top
			.shadow-after-1 	= shadow 1 header bottom
			.shadow-before-2 	= shadow 2 header top
			.shadow-after-2 	= shadow 2 header bottom
			.shadow-before-3 	= shadow 3 header top
			.shadow-after-3 	= shadow 3 header bottom
	-->
	<section class="page-header dark page-header-xs">
		<div class="container">

			<h1 class="uppercase">#{{$tag}}</h1>

			<!-- breadcrumbs -->
			<ol class="breadcrumb">
				<li><a href="#">{{trans('general.home')}}</a></li>
				<li><a href="#">{{trans('general.posts')}}</a></li>
				<li class="active">{{$tag}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->




	<!-- -->
	<section>
		<div class="container">

			<div class="row">
				@foreach($posts as $post)
					@if($post->video)
						<!-- POST ITEM -->
						<div class="blog-post-item col-md-6 col-sm-6">

							<!-- VIDEO -->
							<div class="mb-20">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/xT4DD-z312Q"></iframe>
								</div>
							</div>

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

									<a class="category" href="{{$post->category->showRoute}}">
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

							{{$post->subtitle}}

							<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
								<i class="fa fa-plus"></i>
								<span>{{trans('general.read-more')}}</span>
							</a>

						</div>
						<!-- /POST ITEM -->
					@elseif($post->image)
						<!-- POST ITEM -->
						<div class="blog-post-item col-md-6 col-sm-6">

							<!-- IMAGE -->
							<figure class="mb-20">
								<img class="img-fluid" src="{{asset('assets/theme-2/demo_files/images/content_slider/10-min.jpg')}}" alt="">
							</figure>

							<h2><a href="{{$post->showRoute}}">BLOG IMAGE POST</a></h2>

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

									<a class="category" href="{{$post->category->showRoute}}">
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

							{{$post->subtitle}}

							<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
								<i class="fa fa-plus"></i>
								<span>{{trans('general.read-more')}}</span>
							</a>

						</div>
						<!-- /POST ITEM -->
					@else
						<!-- POST ITEM -->
						<div class="blog-post-item col-md-6 col-sm-6">

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

									<a class="category" href="{{$post->category->showRoute}}">
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

							{{$post->subtitle}}

							<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
								<i class="fa fa-plus"></i>
								<span>{{trans('general.read-more')}}</span>
							</a>

						</div>
						<!-- /POST ITEM -->
					@endif
				@endforeach
			</div>
		</div>
	</section>
	<!-- / -->
				
@endsection