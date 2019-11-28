<section class="pv-30">
	<div class="container" id="homepage-about-tabs">
		<div class="row mb-0">
			<div class="col-md-6 our-offer">
				<h2>{{trans('general.what_we') .  ' ' . trans('general.offer')}}</h2>
				<div class="separator-2"></div>
				<div class="about-text">
					{{substr(strip_tags($about->offer), 0, 650)}} ...
					<a href="{{route('about')}}" class="btn btn-default btn-hvr hvr-shutter-out-horizontal btn-lg"><i class="fa fa-id-card-o pr-10"></i>{{trans('general.read-more')}}</a>
				</div>
			</div>
			<div class="col-md-6">
				<br>
				<div class="overlay-container overlay-visible">
					<img class="about-slider-image lazy" data-src="{{asset('images/about/medium/'.$about->image)}}" alt="">
					<a href="{{route('about')}}" class="overlay-link"><i class="fa fa-link"></i></a>
					<div class="overlay-bottom hidden-xs">
						<div class="text">{{$settings->slogan}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</section>