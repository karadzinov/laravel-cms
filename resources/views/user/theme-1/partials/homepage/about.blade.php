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
				{{-- @if($about->video)
					{!!$about->videoPreview!!}
				@else --}}
					<div class="overlay-container overlay-visible">
						<img class="about-slider-image" src="{{asset('images/about/medium/'.$about->image)}}" alt="">
						<a href="{{route('about')}}" class="overlay-link"><i class="fa fa-link"></i></a>
						<div class="overlay-bottom hidden-xs">
							<div class="text">{{$settings->slogan}}
							</div>
						</div>
					</div>
				{{-- @endif --}}
				{{-- <div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs style-1" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="icon-heart pr-10"></i>{{trans('general.we_love')}}</a></li>
						<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{trans('general.what')}}</a></li>
						<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">{{trans('general.why_us')}}</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home">
							<div class="overlay-container overlay-visible">
								<img src="{{asset('images/about/medium/'.$about->image)}}" alt="">
								<a href="{{route('about')}}" class="overlay-link"><i class="fa fa-link"></i></a>
								<div class="overlay-bottom hidden-xs">
									<div class="text">{{$settings->slogan}}
									</div>
								</div>
							</div>										
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile">
							<div class="embed-responsive embed-responsive-16by9">
								{!!$about->videoPreview!!}
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="messages">
							{{substr(strip_tags($about->why_us), 0, 850)}} ...
							<br><a href="{{route('about')}}">{{trans('general.read-more')}}</a>
						</div>
					</div>
				</div>		 --}}			
			</div>
		</div>
	</div>
	<br>
</section>