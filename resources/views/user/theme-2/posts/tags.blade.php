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
		.post-image{
			height: 305px;
			width: 100%;
			object-fit: cover;
		}
		.product-thumbnail{
			height: 540px;
			width: 100%;
			  object-fit: cover;

		}
		.blog-post-item{
			background: white;
			padding-top: 15px;
		}
		.shop-item{
			background:white;
			padding: 15px;
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

			<h1 class="uppercase">#{{$tag->name}}</h1>

			<!-- breadcrumbs -->
			<ol class="breadcrumb">
				<li><a href="{{route('public.home')}}">{{trans('general.home')}}</a></li>
				<li><a href="{{route('posts.index')}}">{{trans('general.posts')}}</a></li>
				<li class="active">{{$tag->name}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->




	<!-- -->
	<section>
		<div class="container">
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item"><a class="nav-link @if($activeTab === 'products') active @endif" href="#products" data-toggle="tab">{{trans('general.products')}}</a></li>
				<li class="nav-item"><a class="nav-link @if($activeTab === 'posts') active @endif" href="#posts" data-toggle="tab">{{trans('general.posts')}}</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane @if($activeTab === 'products') in active @endif" id="products">
					@if($tag->products->isNotEmpty())
						<ul class="shop-item-list row list-inline m-0">

							@foreach($tag->products as $product)
								@include($path.'/partials/products/list-item')
							@endforeach
						</ul>
					@else
						<p>
							{{ trans('general.no-products-for-tag') }}
						</p>
					@endif
				</div>
				<div class="tab-pane @if($activeTab === 'posts') in active @endif" id="posts">
					@if($tag->posts->isNotEmpty())
						@include($path . 'partials/posts/posts-list', ['posts'=>$tag->posts])
					@else
						<p>
							{{ trans('general.no-products-for-tag') }}
						</p>
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- / -->
				
@endsection