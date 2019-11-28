<!-- ================ -->
<section class="pv-30">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">{{trans('general.why-would-you', ['name'=>$settings->title])}}</strong></h2>
				<div class="separator"></div>
				<p class="large text-center">{{trans('general.why-us-subtitle')}}</p>
				<br>
			</div>
		</div>
	</div>
	@if($about->images->isNotEmpty())
		<div class="owl-carousel content-slider-with-large-controls">
			@foreach($about->images as $image)
				@if($loop->iteration%2!==0)
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<img data-src="{{$about->mediumPath . $image->name}}" class="about-images lazy" alt="">
							</div>
							<div class="col-md-6">
								<p>{{substr(strip_tags($about->why_us), 0, 1400) }}</p>
								<p><a href="page-services.html" class="btn btn-default-transparent btn-animated">{{trans('general.learn_more')}} <i class="fa fa-arrow-right pl-10"></i></a></p>
							</div>
						</div>
					</div>
				@else
					<div class="container">
						<div class="row">
							<div class="col-md-6 text-right">
								<p>{{substr(strip_tags($about->why_us), 0, 1400) }}</p>
								<p><a href="page-services.html" class="btn btn-default-transparent btn-animated">{{trans('general.learn_more')}} <i class="fa fa-arrow-right pl-10"></i></a></p>
							</div>
							<div class="col-md-6">
								<img data-src="{{$about->mediumPath . $image->name}}" class="about-images lazy" alt="">
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	@endif
</section>
<!-- section end