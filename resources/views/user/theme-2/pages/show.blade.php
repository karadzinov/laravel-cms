@extends($path . 'master')

@section('optionalHead')
	<style>
		.slider-image-container{

			display: flex;
		    flex-direction: row;
		    justify-content: space-around;
		}
		.slider-image-container img{
			height: 475px;
		}
	</style>
@endsection

@section('content')
	<!-- -->
	<section>
		<div class="container">
			@if($page->images->isNotEmpty())
				<div class="clearfix mb-60">
					<!-- OWL SLIDER -->
					<div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"items": 1, "autoPlay": 4500, "autoHeight": false, "navigation": true, "pagination": true, "transitionStyle":"fadeUp", "progressBar":"false"}'>
						@foreach($page->images as $image)
							<a class="lightbox slider-image-container" href="{{$page->mediumPath . $image->name}}" data-plugin-options='{"type":"image"}'>
								<img class="img-fluid lazy" data-src="{{$page->originalPath . $image->name}}" alt="" />
							</a>
						@endforeach
					</div>
					<!-- /OWL SLIDER -->
				</div>
			@endif
			<div class="row">
				<!-- LEFT -->
				<div class="col-md-12 col-sm-12">

					<h1 class="blog-post-title">{{$page->title}}</h1>
					<small class="text-small">{{$page->subtitle}}</small>
					<ul class="blog-post-info list-inline">
						<li>
							<a href="javascript:void(0)">
								<i class="fa fa-clock-o"></i> 
								<span class="font-lato">{{$page->created_at->format('M d, Y')}}</span>
							</a>
						</li>
					</ul>
					<!-- article content -->
					{!!$page->main_text!!}
					<!-- /article content -->
					<div class="divider divider-dotted"><!-- divider --></div>
					<!-- SHARE POST -->
					@include($path.'partials/share', ['title'=>$page->title])
					<!-- /SHARE POST -->
				</div>

			</div>
		</div>
	</section>
	<!-- / -->
@endsection

@section('optionalScripts')
	<script src="{{ asset('js/share.js') }}"></script>
@endsection