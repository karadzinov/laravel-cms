@extends($path . 'master')

@section('optionalHead')
	<style>
		.slider-image{
			height: 475px;
			width: 100%;
			object-fit: cover;
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
							<a class="lightbox" href="{{$page->mediumPath . $image->name}}" data-plugin-options='{"type":"image"}'>
								<img class="img-fluid slider-image" src="{{$page->originalPath . $image->name}}" alt="" />
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
					<ul class="blog-post-info list-inline">
						<li>
							<a href="#">
								<i class="fa fa-clock-o"></i> 
								<span class="font-lato">{{$page->created_at->format('M d, Y')}}</span>
							</a>
						</li>
					</ul>


					<!-- article content -->
					{!!$page->main_text!!}
					<!-- /article content -->


					<div class="divider divider-dotted"><!-- divider --></div>

				</div>

			</div>


		</div>
	</section>
	<!-- / -->
@endsection