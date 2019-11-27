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
					@if($posts->count())
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
										<a href="javascript:void(0)">
											<i class="fa fa-clock-o"></i> 
											<span class="font-lato">{{$post->created_at->format('M d, Y')}}</span>
										</a>
									</li>
									@if($post->location)
										<li>
											<a href="javascript:void(0)">
												<i class="fa fa-map-marker"></i> 
												<span class="font-lato">{{$post->location}}</span>
											</a>
										</li>
									@endif
									<li>
										<i class="fa fa-folder-open-o"></i> 

										<a class="category" href="javascript:void(0)">
											<span class="font-lato">{{$post->category->name}}</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
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
					@else
						<p class="lead">{{trans('general.no-results')}}</p>
					@endif

				</div>


				<!-- RIGHT -->
				<div class="col-md-3 col-sm-3">
					@include($path . 'partials/sidebar')
				</div>

			</div>

		</div>
	</section>
@endsection