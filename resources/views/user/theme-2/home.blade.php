
@extends($path . 'master')

@section('optionalHead')
	<!-- LAYER SLIDER -->
	<link href="{{asset('assets/theme-2/plugins/slider.layerslider/css/layerslider.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/theme-2/plugins/slider.layerslider/plugins/origami/layerslider.origami.css')}}" rel="stylesheet" type="text/css" />
	<style>
		#header.translucent{
			position: absolute;
		}
		.premium-thumbnail-circle figure img{
			height: 230px;
			object-fit: cover;
			max-width: 300px;
			-webkit-border-radius: 50%
		}
		.homepage-post-image{
			height: 190px;
			width: 100%;
			object-fit: cover;
		}
		.section-title{
			margin-top:50px !important;
			margin-bottom:-50px !important;
			text-transform: uppercase;
		}
		.alternate{
			border: 0;
		}
		.info-bar .about-welcome{
			line-height: 1.5em;
		}
	</style>
@endsection
@section('title', trans('general.navigation.home'))
@section('content')
	<!-- REVOLUTION SLIDER -->
	<section id="slider" class="slider fullwidthbanner-container roundedcorners">
		<!--
			Navigation Styles:
			
				data-navigationStyle="" theme default navigation
				
				data-navigationStyle="preview1"
				data-navigationStyle="preview2"
				data-navigationStyle="preview3"
				data-navigationStyle="preview4"
				
			Bottom Shadows
				data-shadow="1"
				data-shadow="2"
				data-shadow="3"
				
			Slider Height (do not use on fullscreen mode)
				data-height="300"
				data-height="350"
				data-height="400"
				data-height="450"
				data-height="500"
				data-height="550"
				data-height="600"
				data-height="650"
				data-height="700"
				data-height="750"
				data-height="800"
		-->
		@if($slides->isNotEmpty())
			<div class="fullscreenbanner" data-navigationStyle="preview1">
				<ul class="hide">
					@foreach($slides as $slide)
						@if($loop->iteration%2!==0)
							<!-- SLIDE  -->
							<li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{$slide->title}}" data-thumb="{{$slide->thumbnailPath}}">

								<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{$slide->originalPath}}" alt="" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="110" />
								@if($slide->top_title)
									<div class="tp-caption customin ltl tp-resizeme text_white"
										data-x="right" data-hoffset="-100"
										data-y="150"
										data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
										data-speed="800"
										data-start="1000"
										data-easing="easeOutQuad"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.01"
										data-endelementdelay="0.1"
										data-endspeed="1000"
										data-endeasing="Power4.easeIn" style="z-index: 3;">
										<span class="fw-300">{{$slide->top_title}}</span>
									</div>
								@endif
								<div class="tp-caption very_large_text lfb ltt tp-resizeme"
									data-x="right" data-hoffset="-100"
									data-y="center" data-voffset="-100"
									data-speed="600"
									data-start="800"
									data-easing="Power4.easeOut"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.01"
									data-endelementdelay="0.1"
									data-endspeed="500"
									data-endeasing="Power4.easeIn">
									{{$slide->title}}
								</div>

								<div class="tp-caption medium_light_white lfb ltt tp-resizeme"
									data-x="right" data-hoffset="-110"
									data-y="center" data-voffset="10"
									data-speed="600"
									data-start="900"
									data-easing="Power4.easeOut"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.01"
									data-endelementdelay="0.1"
									data-endspeed="500"
									data-endeasing="Power4.easeIn">
									{{$slide->subtitle}}
								</div>
								@if($slide->link)
									<div class="tp-caption customin ltl tp-resizeme"
										data-x="right" data-hoffset="-110"
										data-y="433"
										data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
										data-speed="800"
										data-start="1550"
										data-easing="easeOutQuad"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.01"
										data-endelementdelay="0.1"
										data-endspeed="1000"
										data-endeasing="Power4.easeIn" style="z-index: 10;">
										<a href="{{$slide->link}}" class="btn btn-default btn-lg pull-right">
											<span>{{trans('general.read-more')}}</span> 
										</a>
									</div>
								@endif

							</li>

						@else
							<!-- SLIDE  -->
							<li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{$slide->title}}" data-thumb="{{$slide->thumbnailPath}}">

								<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{$slide->originalPath}}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />

								<div class="tp-dottedoverlay twoxtwo"><!-- dotted overlay --></div>
								<div class="overlay dark-3"><!-- dark overlay [1 to 9 opacity] --></div>

								@if($slide->top_title)
									<div class="tp-caption customin ltl tp-resizeme text_white"
										data-x="center"
										data-y="205"
										data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
										data-speed="800"
										data-start="1000"
										data-easing="easeOutQuad"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.01"
										data-endelementdelay="0.1"
										data-endspeed="1000"
										data-endeasing="Power4.easeIn" style="z-index: 10;">
										<span class="fw-300">{{$slide->top_title}}</span>
									</div>
								@endif

								<div class="tp-caption customin ltl tp-resizeme large_bold_white"
									data-x="center"
									data-y="255"
									data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
									data-speed="800"
									data-start="1200"
									data-easing="easeOutQuad"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.01"
									data-endelementdelay="0.1"
									data-endspeed="1000"
									data-endeasing="Power4.easeIn" style="z-index: 10;">
									{{$slide->title}}
								</div>

								<div class="tp-caption customin ltl tp-resizeme small_light_white font-lato fs-20"
									data-x="center"
									data-y="345"
									data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
									data-speed="800"
									data-start="1400"
									data-easing="easeOutQuad"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.01"
									data-endelementdelay="0.1"
									data-endspeed="1000"
									data-endeasing="Power4.easeIn" style="z-index: 10; width: 100%; max-width: 750px; white-space: normal; text-align:center;">
									{{$slide->subtitle}}
								</div>

								@if($slide->link)
									<div class="tp-caption customin ltl tp-resizeme"
										data-x="center"
										data-y="433"
										data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
										data-speed="800"
										data-start="1550"
										data-easing="easeOutQuad"
										data-splitin="none"
										data-splitout="none"
										data-elementdelay="0.01"
										data-endelementdelay="0.1"
										data-endspeed="1000"
										data-endeasing="Power4.easeIn" style="z-index: 10;">
										<a href="{{$slide->link}}" class="btn btn-default btn-lg">
											<span>{{trans('general.read-more')}}</span> 
										</a>
									</div>
								@endif

							</li>
						@endif
					@endforeach
				</ul>
				<div class="tp-bannertimer"></div>
			</div>
		@endif
	</section>
	<!-- /REVOLUTION SLIDER -->
	<h2 class="text-center mt-50 text-muted uppercase">
		{{trans('general.welcome') . ' '. trans('general.to') . ' ' . $settings->title}}
	</h2>
	<section class="info-bar info-bar-clean">
		<div class="container">
			@if($about)
				<p class="about-welcome fs-17 text-center mb-50">
					{{$about->welcome_note}}
				</p>
			@endif
			<h2 class="text-center text-muted mb-40">{{trans('general.check-latest-news')}}</h2>
			<div class="row">
				@if($categories->isNotEmpty())
					@foreach($categories as $category)
						<div class="col-sm-4 testimonial homepageCategories">
							<figure class="float-left">
								<img class="rounded" src="{{$category->thumbnailPath}}" alt="">
							</figure>
							<div class="testimonial-content">
			                    <a href="{{$category->showRoute}}" class="text-muted">
			                    	<cite>
			                    	    {{$category->name}}
			                    	    {{-- <span>{{$testimonial->comapny}}</span> --}}
			                    	</cite>
			                    	<p>{{$category->description}}</p>
			                    </a>
			                </div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</section>

		<!--  -->
	<h2 class="text-center section-title text-muted">
		{{trans('general.why-would-you', ['name'=>$settings->title])}}
	</h2>
	@if($about)
		<section>
			<div class="container">
				<div class="row">
				
					<div class="col-md-4">
						
						<div class="heading-title heading-border-bottom heading-color">
							<h3 class="text-muted">{{trans('general.about_us')}}</h3>
						</div>
						
						<p>{{substr(strip_tags($about->why_us), 0, 200) }}...</p>
						
						<a href="{{route('about')}}">
							{{trans('general.read')}}
							<!-- /word rotator -->
							<span class="word-rotator" data-delay="2000">
								<span class="items">
									<span>{{trans('general.more')}}</span>
									<span>{{trans('general.now')}}</span>
								</span>
							</span><!-- /word rotator -->
							<i class="glyphicon glyphicon-menu-right fs-12"></i>
						</a>

					</div>

					<div class="col-md-4">
						<div class="heading-title heading-border-bottom heading-color">
							<h3 class="text-muted">{{trans('general.what_we') .  ' ' . trans('general.offer')}}</h3>
						</div>
						<p>{{substr(strip_tags($about->offer), 0, 200) }}...</p>

						<a href="{{route('about')}}">
							{{trans('general.read')}}
							<!-- /word rotator -->
							<span class="word-rotator" data-delay="2000">
								<span class="items">
									<span>{{trans('general.more')}}</span>
									<span>{{trans('general.now')}}</span>
								</span>
							</span><!-- /word rotator -->
							<i class="glyphicon glyphicon-menu-right fs-12"></i>
						</a>

					</div>

					<div class="col-md-4">
						<div class="heading-title heading-border-bottom heading-color">
							<h3 class="text-muted">{{trans('general.why') . ' ' . trans('general.choose_us')}}</h3>
						</div>
						<p>{{substr(strip_tags($about->why_us), 0, 200) }}...</p>

						<a href="{{route('about')}}">
							{{trans('general.read')}}
							<!-- /word rotator -->
							<span class="word-rotator" data-delay="2000">
								<span class="items">
									<span>{{trans('general.more')}}</span>
									<span>{{trans('general.now')}}</span>
								</span>
							</span><!-- /word rotator -->
							<i class="glyphicon glyphicon-menu-right fs-12"></i>
						</a>

					</div>

				</div>
				@if($about->images->isNotEmpty())
					@include($path . 'partials/homepage/about-slider')
				@endif
			</div>
		</section>
	@endif
	<!-- / -->
	
	@if($partners->isNotEmpty())
		<h2 class="text-center section-title text-muted">
			{{trans('general.our-partners')}}
		</h2>
		<section>
			<!-- 
				controlls-over		= navigation buttons over the image 
				buttons-autohide 	= navigation buttons visible on mouse hover only
				
				data-plugin-options:
					"singleItem": true
					"autoPlay": true (or ms. eg: 4000)
					"navigation": true
					"pagination": true
			-->
			<div class="text-center">
				<div class="owl-carousel m-0" data-plugin-options='{"singleItem": false, "autoPlay": true}'>
					@foreach($partners as $partner)
						<div title='{{$partner->name}}'>
							<a href="{{$partner->link}}" target="_blank">
								<img class="img-fluid" src="{{$partner->thumbnailPath}}" alt="">
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if($testimonials->isNotEmpty())
		<h2 class="text-center section-title text-muted">
			{{trans('general.our-clients-about-us')}}
		</h2>
		<section>
			<div class="container">
				<div class="row">
					@foreach($testimonials as $testimonial)
						<div class="col-md-3 col-sm-12">
							<div class="premium-thumbnail-circle">
								<a href="javascript:void(0)">

									<div class="spinner"></div>

											<figure>
												<img class="testimonialImage" src="{{$testimonial->thumbnailPath}}" alt="img">
											</figure>

										<div class="info">
											<div class="info-back">
												<h3 class="uppercase">
													{{$testimonial->title}}
												</h3>

												<p>
													{{$testimonial->name}}
													<br>
													<strong>{{$testimonial->company}}</strong>
												</p>
										</div>

									</div>

								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if($posts->isNotEmpty())
		<h2 class="text-center section-title text-muted">
			{{trans('general.navigation.posts')}}
		</h2>
		<section>
			<div class="container">
				<p class="text-center">{{trans('general.check-latest-news')}}</p>
				<div class="row">
					@foreach($posts as $post)
						<div class="col-sm-6 col-md-3 text-center">
							<div class="thumbnail">
								<a href="{{$post->showRoute}}">
									<img class="homepage-post-image img-fluid grayscale-hover-color" src="{{$post->thumbnailPath}}" alt="" />
								</a>
							</div>
							<h4 class="mt-6 uppercase text-muted">{{$post->title}}</h4>
						</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif

	<!-- BUTTON CALLOUT -->
	<a href="javascripts:void(0)" class="btn btn-xlg btn-teal fs-20 fullwidth m-0 rad-0 p-40">
		<span class="font-lato fs-30">
			{{trans('general.did-conviced-you', ['name'=>$settings->title])}}
			<strong>{{trans('general.contact_us')}} &raquo;</strong>
		</span>
	</a>
	<!-- /BUTTON CALLOUT -->
@endsection

@section('optionalScripts')
	<!-- LAYER SLIDER -->
	<script src="{{asset('assets/theme-2/plugins/slider.layerslider/js/layerslider_pack.js')}}"></script>
	<script src="{{asset('assets/theme-2/plugins/slider.layerslider/plugins/origami/layerslider.origami.js')}}"></script>
	<script src="{{asset('assets/theme-2/js/view/demo.layerslider_slider.js')}}"></script>

	<script>
		var layer_options = {

            sliderVersion: '6.1.0',
            pauseOnHover: 'disabled',
            navStartStop: false,
            hoverBottomNav: true,
            showCircleTimer: false,
            skinsPath: '{{asset('assets/theme-2/plugins/slider.layerslider/skins')}}'+'/',
            plugins: ["origami"],

		}
	</script>
@endsection