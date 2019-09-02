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
				<li><a href="javascript:void(0)">{{trans('general.home')}}</a></li>
				<li><a href="javascript:void(0)">{{trans('general.posts')}}</a></li>
				<li class="active">{{$tag}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->




	<!-- -->
	<section>
		<div class="container">

			{{-- <div class="row"> --}}
				@include($path . 'partials/posts/posts-list')
			{{-- </div> --}}
		</div>
	</section>
	<!-- / -->
				
@endsection