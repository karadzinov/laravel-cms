@if($testimonials->isNotEmpty())
<h2 class="text-center section-title">{{trans('general.our-clients-about-us')}}</h2>
<div class="separator"></div>
	<div class="owl-carousel content-slider">
		@foreach($testimonials as $testimonial)
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="testimonial text-center">
							<div class="testimonial-image">
								<img data-src="{{$testimonial->thumbnailPath}}" alt="{{$testimonial->name}}" title="{{$testimonial->name}}" class="img-circle lazy">
							</div>
							<h3>{{$testimonial->title}}</h3>
							<div class="separator"></div>
							<div class="testimonial-body">
								<blockquote>
									<p>{{$testimonial->content}}</p>
								</blockquote>
								<div class="testimonial-info-1">- {{$testimonial->name}}</div>
								@if($testimonial->company)
									<div class="testimonial-info-2">By {{$testimonial->company}}</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endif