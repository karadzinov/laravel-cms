@extends($path . 'master')

@section('optionalHead')
	<style>
		#header.translucent{
			position: relative;
		}
		.searchResultsTitle{
			background-color: #8AB933;
				color: white;
		}
		#header.translucent + section.page-header{
			margin-top: 0;
			margin-bottom: 0;
			padding: 20px 0 20px 0;
		}
		body.grain-grey section.page-header{
		    color: #fff;
		    background-color: #151515 !important;
		}
		.no-results h2{
			margin: 25%;
		}
		.alert{
			padding-bottom: 0px;
		}
	</style>
@endsection
@section('title', trans('general.search'))
@section('content')

	
	<!-- /PAGE HEADER -->
	<section class="page-header page-header-xs dark">
		<div class="container">

			<h1>{{trans('general.search-results-for')}} "{{$search}}"</h1>

			<!-- breadcrumbs -->
			<ol class="breadcrumb">
				<li><a href="{{route('public.home')}}">{{trans('general.navigation.home')}}</a></li>
				<li class="active">{{trans('general.search')}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->



	<!-- -->
	<section class="section-sm alternate">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<!-- SEARCH -->
					<form method="get" action="{{route('search')}}" class="clearfix alert alert-default b-0 search-big m-0">
						{{csrf_field()}}
						<div class="input-group">
							<input name="search" id="main_search_box" class="form-control form-control-lg" type="text" placeholder="{{trans('general.search')}}...">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default form-control-lg bl-0">
									<i class="fa fa-search fa-lg p-0"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12">
				<div id="mainSearchResponse"></div>
			</div>
			<!-- /SEARCH -->
			


		</div>
	</section>

	@if(count($posts) || count($products) || count($pages) || count($faqs))
		<!-- -->
		<section>
			<div class="container">
				
				@if(count($products))
					@foreach($products as $product)
						<h2>{{trans('general.navigation.products')}}</h2>
						@if($product->main_image)
							<div class="clearfix search-result"><!-- item -->
								<h4 class="mb-0">
									<a href="{{$product->showRoute}}">
										{{$product->name}}
									</a>
								</h4>
								<small class="text-muted">{{$product->category->name}}</small>
								<img src="{{$product->thumbnail}}" alt="" height="60" />
								<p>{{$product->created_at->format('M d, Y')}}</p>
								<a href="{{$product->showRoute}}" class="text-warning fsize12">{{trans('general.read-more')}}</a>
							</div><!-- /item -->
						@else
							<div class="clearfix search-result"><!-- item -->
								<h4 class="mb-0">
									<a href="{{$product->showRoute}}">
										{{$product->name}}
									</a>
								</h4>
								<small class="text-success">
									{{$product->category->name}},
								</small>
								<small class="text-success">
									{{$product->created_at->format('M d, Y')}}
								</small>

								<p>
									{{$product->short_description}}
									<span>
										<a href="{{$product->showRoute}}" class="text-warning fsize12">
											{{trans('general.read-more')}}
										</a>
									</span>

								</p>
							</div><!-- /item -->	
						@endif
					@endforeach
					<div class="divider divider-dotted"><!-- divider --></div>
				@endif

				@if(count($posts))
					<h2>{{trans('general.navigation.posts')}}</h2>
					@foreach($posts as $post)
						@if($post->image)
							<div class="clearfix search-result"><!-- item -->
								<h4 class="mb-0">
									<a href="{{$post->showPage}}">
										{{$post->title}}
									</a>
								</h4>
								<small class="text-muted">{{$post->category->name}}</small>
								<img src="{{$post->thumbnailPath}}" alt="" height="60" />
								<p>{{$post->created_at->format('M d, Y')}}- {{trans('general.written-by')}} {{$post->author->name}}</p>
								<a href="{{$post->showRoute}}" class="text-warning fsize12">{{trans('general.read-more')}}</a>
							</div><!-- /item -->
						@else
							<div class="clearfix search-result"><!-- item -->
								<h4 class="mb-0">
									<a href="{{$post->showRoute}}">
										{{$post->title}}
									</a>
								</h4>
								<small class="text-success">
									{{$post->category->name}},
								</small>
								<small class="text-success">
									{{$post->created_at->format('M d, Y')}}- {{trans('general.written-by')}} {{$post->author->name}}
								</small>

								<p>
									{{$post->subtitle}}
									<span>
										<a href="{{$post->showRoute}}" class="text-warning fsize12">
											{{trans('general.read-more')}}
										</a>
									</span>

								</p>
							</div><!-- /item -->	
						@endif
					@endforeach
					<div class="divider divider-dotted"><!-- divider --></div>
				@endif
				
				@if(count($pages))
					<h2>{{trans('general.navigation.pages')}}</h2>
					@foreach($pages as $page)
						@if($page->images->isNotEmpty())
							<div class="clearfix search-result"><!-- item -->
								<h4 class="mb-0">
									<a href="{{$page->showPage}}">
										{{$page->title}}
									</a>
								</h4>
								<img src="{{$page->thumbnailPath . $page->images[0]->name}}" alt="" height="60" />
								<p>{{$page->subtitle}}</p>
								<a href="{{$page->showRoute}}" class="text-warning fsize12">
									{{trans('general.read-more')}}
								</a>
							</div><!-- /item -->
						@else
							<div class="clearfix search-result"><!-- item -->
								<h4 class="mb-0">
									<a href="{{$page->showRoute}}">
										{{$page->title}}
									</a>
								</h4>
								<p>{{$post->subtitle}}</p>
								<a href="{{$page->showRoute}}" class="text-warning fsize12">
									{{trans('general.read-more')}}
								</a>
							</div><!-- /item -->	
						@endif
					@endforeach
					<div class="divider divider-dotted"><!-- divider --></div>
				@endif

				@if(count($faqs))
					<h2>{{trans('general.navigation.faq')}}</h2>
					@foreach($faqs as $faq)
						<div class="clearfix search-result"><!-- item -->
							<h4 class="mb-0">
								<a href="{{route('faq.index')}}">
									{{$faq->question}}
								</a>
							</h4>
							<small class="text-success">
								{{$faq->category->name}}
							</small>
							<p>{{ substr($faq->answer, 0, 300) }}... 
								<span>
									<a href="{{route('faq.index')}}" class="text-warning fsize12">
										{{trans('general.read-more')}}
									</a>
								</span>
							</p>
						</div><!-- /item -->	
					@endforeach
					<div class="divider divider-dotted"><!-- divider --></div>
				@endif
			</div>
		</section>
		<!-- / -->

	@else
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="no-results text-center">
						<h2>
							<i class="et-sad"></i> 
							{{trans('general.no-results-for')}} "{{$search}}".
						</h2>
					</div>
				</div>
			</div>
		</div>
	@endif
@endsection