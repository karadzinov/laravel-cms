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
					@include($path . 'partials/sidebar')
				</div>

			</div>


		</div>
	</section>
	<!-- / -->
@endsection