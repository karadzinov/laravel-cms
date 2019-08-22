<!-- REVOLUTION SLIDER -->
<div class="slider fullwidthbanner-container roundedcorners mb-100">
	<div class="fullwidthbanner" data-height="500" data-shadow="3" data-navigationStyle="">
		<ul class="hide">

			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
				<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{$about->originalPath . $about->images[0]->name}}" alt="" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />

				<div class="tp-caption lft start" 
					data-x="0" 
					data-y="0" 
					data-speed="750" 
					data-start="750" 
					data-easing="easeOutExpo" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300">
						<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" alt="" data-lazyload="{{asset('assets/theme-2/images/_smarty/caption_bg.png')}}">
				</div>

				<div class="tp-caption medium_light_white lfb start" 
					data-x="left" data-hoffset="70"
					data-y="96" 
					data-speed="300" 
					data-start="1200" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300">
						{{trans('general.why') . $settings->title}}
				</div>

				<div class="tp-caption block_black lfl start" 
					data-x="left" data-hoffset="70"
					data-y="195" 
					data-speed="300" 
					data-start="1500" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300" >
						{{$settings->slogan}}
				</div>

				<div class="tp-caption small_light_white lfl start" 
					data-x="left" data-hoffset="70"
					data-y="250" 
					data-speed="1000" 
					data-start="1800" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300" >
						Many of our satisfied clients <br>
						Would recommend you to work with us. <br>
						Check Their Testimonials Bellow.

				</div>
			</li>

			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off" >
				<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{$about->originalPath . $about->images[1]->name}}" alt="" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />

				<div class="tp-caption lft start" 
					data-x="right" 
					data-y="0" 
					data-speed="750" 
					data-start="750" 
					data-easing="easeOutExpo" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300">
						<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" alt="" data-lazyload="{{asset('assets/theme-2/images/_smarty/caption_bg.png')}}">
				</div>

				<div class="tp-caption medium_light_white lfb start" 
					data-x="left" data-hoffset="810"
					data-y="96" 
					data-speed="300" 
					data-start="1200" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300">
						Epona Great<br /> Revolution Captions
				</div>

				<div class="tp-caption block_black lfl start" 
					data-x="left" data-hoffset="810"
					data-y="195" 
					data-speed="300" 
					data-start="1500" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300" >
						CHECK!
				</div>

				<div class="tp-caption small_light_white lfl start about-slider-text" 
					data-x="left" data-hoffset="810"
					data-y="250" 
					data-speed="1000" 
					data-start="1800" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300" >
						<p>{!!$about->why_us!!}</p>
						
				</div>
			</li>

			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off" >
				<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{$about->originalPath . $about->images[2]->name}}" alt="" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" />

				<div class="tp-caption lft start" 
					data-x="-86" 
					data-y="296" 
					data-speed="750" 
					data-start="750" 
					data-easing="easeOutExpo" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300">
					<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" alt="" data-lazyload="{{asset('assets/theme-2/images/_smarty/caption_bg.png')}}">
				</div>

				<div class="tp-caption medium_light_white lfb start" 
					data-x="34" 
					data-y="320" 
					data-speed="300" 
					data-start="1500" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300" >
						{{trans('general.our-offer')}}
				</div>

				<div class="tp-caption small_light_white lfb start" 
					data-x="34" 
					data-y="400" 
					data-speed="300" 
					data-start="1500" 
					data-easing="easeOutExpo" 
					data-splitin="none" 
					data-splitout="none" 
					data-elementdelay="0.1" 
					data-endelementdelay="0.1" 
					data-endspeed="300" >
						<p class="about-slider-text">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda minima, sunt ea earum expedita nam corporis nulla aliquid ratione enim, qui magni architecto blanditiis. Ut optio quo debitis placeat ad.
						</p>
				</div>

			</li>

		</ul>

		<div class="tp-bannertimer"><!-- progress bar --></div>
	</div>
</div>
<!-- /REVOLUTION SLIDER -->