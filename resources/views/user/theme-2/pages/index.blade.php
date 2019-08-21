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
		.page-image{
			width: 100%;
			height: 380px;
			object-fit: cover;
		}
	</style>
@endsection

@section('content')
	@if($pages->isNotEmpty())
		<section class="page-header dark page-header-xs">
			<div class="container">

				<h1 class="uppercase">{{trans('general.pages')}}</h1>

				<!-- breadcrumbs -->
				<ol class="breadcrumb">
					<li><a href="/home">{{trans('general.home')}}</a></li>
					<li class="active">{{trans('general.navigation.pages')}}</li>
				</ol><!-- /breadcrumbs -->

			</div>
		</section>
		<!-- /PAGE HEADER -->

		<!-- -->
		<section>
			<div class="container">

				@foreach($pages as $page)
					@if($page->images->isNotEmpty())
						<!-- POST ITEM -->
						<div class="blog-post-item">

							<!-- OWL SLIDER -->
							<div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"items": 1, "autoPlay": 3000, "autoHeight": false, "navigation": true, "pagination": true, "transitionStyle":"fadeUp", "progressBar":"false"}'>
								@foreach($page->images as $image)
									<div>
										<img class="img-fluid page-image" src="{{$page->originalPath . $image->name}}" alt="">
									</div>
								@endforeach
							</div>
							<!-- /OWL SLIDER -->

							<h2 class="uppercase"><a href="{{route('categories.pages.show', $page->slug)}}">{{$page->title}}</a></h2>

							<ul class="blog-post-info list-inline">
								<li>
									<a href="#">
										<i class="fa fa-clock-o"></i> 
										<span class="font-lato">{{$page->created_at->format('M d, Y')}}</span>
									</a>
								</li>
							</ul>

							<p>{{$page->subtitle}}</p>

							<a href="{{route('categories.pages.show', $page->slug)}}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
								<i class="fa fa-plus"></i>
								<span>{{trans('general.read-more')}}</span>
							</a>

						</div>
						<!-- /POST ITEM -->
					@else
						<!-- POST ITEM -->
						<div class="blog-post-item">

							<h2 class="uppercase"><a href="{{route('categories.pages.show', $page->slug)}}">{{$page->title}}</a></h2>

							<ul class="blog-post-info list-inline">
								<li>
									<a href="#">
										<i class="fa fa-clock-o"></i> 
										<span class="font-lato">{{$page->created_at->format('M d, Y')}}</span>
									</a>
								</li>
							</ul>

							<p>{{$page->subtitle}}</p>

							<a href="{{route('categories.pages.show', $page->slug)}}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
								<i class="fa fa-plus"></i>
								<span>{{trans('general.read-more')}}</span>
							</a>

						</div>
						<!-- /POST ITEM -->
					@endif
				@endforeach
				<!-- PAGINATION -->
				<div class="pager">
					{{$pages->links()}}
				</div>
				<!-- /PAGINATION -->

			</div>
		</section>

	@else
		@include($path . 'comingSoon')
	@endif
@endsection