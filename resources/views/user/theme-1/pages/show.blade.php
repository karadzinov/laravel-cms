@extends($path . 'master')
@section('optionalHead')
	<style>
		#mainImage{
			max-height: 600px;
			width: 100%;
			object-fit: cover;
			margin: 0 auto;
		}
		.bottomImage{
			height: 167.5px !important;
			object-fit: cover;
			width: 100%;
			padding-top: 20px;
		}
		.facebook{
			content: 'hahahah' !important;
			/*content: '<i class="icon-pinterest"></i>';*/
		}
	</style>
@endsection
@section('content')
	<!-- breadcrumb start -->
	<!-- ================ -->
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-home pr-10"></i>
					<a href="{{route('public.home')}}">
						{{trans('general.home')}}
					</a>
				</li>
				<li>
					<a href="{{route('pages.index')}}">
						{{trans('general.navigation.pages')}}
					</a>
				</li>
				<li class="active">{!!$page->title!!}</li>
			</ol>
		</div>
	</div>
	<!-- breadcrumb end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{!!$page->title!!}</h1>
					<div class="separator-2"></div>
					<p class="lead">{!!$page->subtitle!!}</p>
					<div class="separator-2"></div>
					
					<p>
						{!!$page->main_text!!}
					</p>

					@if($page->images->isNotEmpty())
						<div class="shadow bordered">
							<div class="overlay-container">
								<img id="mainImage" src="{{$page->originalPath . $page->images()->first()->name}}" alt="">
								<a href="{{$page->originalPath . $page->images->first()->name}}" class="overlay-link popup-img">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							@php
								$page->images->shift()
							@endphp
						</div>
						<div class="space-bottom"></div>
						<div class="row grid-space-20">
							@foreach($page->images as $image)
								<div class="col-xs-3">
									<div class="overlay-container">
										<img class="bottomImage" src="{{$page->thumbnailPath . $image->name}}" alt="">
										<a href="{{$page->originalPath . $image->name}}" class="overlay-link small popup-img">
											<i class="fa fa-plus"></i>
										</a>
									</div>
								</div>
							@endforeach
						</div>
						<br>
						<br>
					@endif
				</div>
				<!-- main end -->

			</div>
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4 pull-right">
					@include($path . 'partials/share', ['title'=>$page->title])
				</div>
			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection

@section('optionalScripts')
	<script src="{{ asset('js/share.js') }}"></script>
@endsection