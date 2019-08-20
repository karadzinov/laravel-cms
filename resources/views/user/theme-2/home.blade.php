@extends($path . 'master')

@section('optionalHead')
	<style>
		#header.translucent{
			position: absolute;
		}
	</style>
@endsection

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
		<div class="fullscreenbanner" data-navigationStyle="preview1">
			<ul class="hide">

				<!-- SLIDE  -->
				<li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide title 1" data-thumb="{{asset('assets/theme-2/demo_files/images/1200x800/10-min.jpg')}}">

					<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{asset('assets/theme-2/demo_files/images/1200x800/10-min.jpg')}}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />

					<div class="tp-dottedoverlay twoxtwo"><!-- dotted overlay --></div>
					<div class="overlay dark-3"><!-- dark overlay [1 to 9 opacity] --></div>

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
						<span class="fw-300">DEVELOPMENT / MARKETING / DESIGN / PHOTO</span>
					</div>

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
						WELCOME TO SMARTY
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
						Fabulas definitiones ei pri per recteque hendrerit scriptorem in errem scribentur mel fastidii propriae philosophia cu mea.
					</div>

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
						<a href="#purchase" class="btn btn-default btn-lg">
							<span>Purchase Smarty Now</span> 
						</a>
					</div>

				</li>

				<!-- SLIDE  -->
				<li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide title 2" data-thumb="{{asset('assets/theme-2/demo_files/images/1200x800/24-min.jpg')}}">

					<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{asset('assets/theme-2/demo_files/images/1200x800/24-min.jpg')}}" alt="" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="110" />

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
						RUN WILD
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
						Happiness is an accident of nature,<br/>
						a beautiful and flawless aberration.<br/>
						<span style="font-size:24px;font-weight:400;">&ndash; Pat Conroy</span>
					</div>

				</li>

				<!-- SLIDE -->
				<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide title 3" data-thumb="{{asset('assets/theme-2/demo_files/images/video/neuron_thumb.jpg')}}">

					<img src="{{asset('assets/theme-2/images/_smarty/1x1.png')}}" data-lazyload="{{asset('assets/theme-2/demo_files/images/video/neuron.jpg')}}" alt="video" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">

					<div class="tp-caption tp-fade fadeout fullscreenvideo"
						data-x="0"
						data-y="100"
						data-speed="1000"
						data-start="1100"
						data-easing="Power4.easeOut"
						data-elementdelay="0.01"
						data-endelementdelay="0.1"
						data-endspeed="1500"
						data-endeasing="Power4.easeIn"
						data-autoplay="true"
						data-autoplayonlyfirsttime="false"
						data-nextslideatend="true"
						data-volume="mute" 
						data-forceCover="1" 
						data-aspectratio="16:9" 
						data-forcerewind="on" style="z-index: 2;">

						<div class="tp-dottedoverlay twoxtwo"><!-- dotted overlay --></div>

						<video class="" preload="none" width="100%" height="100%" poster="{{asset('assets/theme-2/demo_files/images/video/neuron.jpg')}}">
							<source src="{{asset('assets/theme-2/demo_files/images/video/neuron.webm')}}" type="video/webm" />
							<source src="{{asset('assets/theme-2/demo_files/images/video/neuron.mp4')}}" type="video/mp4" />
						</video>

					</div>

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
						data-endeasing="Power4.easeIn" style="z-index: 3;">
						<span class="fw-300">DEVELOPMENT / MARKETING / DESIGN / PHOTO</span>
					</div>

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
						data-endeasing="Power4.easeIn" style="z-index: 3;">
						WELCOME TO SMARTY
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
						data-endeasing="Power4.easeIn" style="z-index: 3; width: 100%; max-width: 750px; white-space: normal; text-align:center;">
						Fabulas definitiones ei pri per recteque hendrerit scriptorem in errem scribentur mel fastidii propriae philosophia cu mea.
					</div>

					<div class="tp-caption customin ltl tp-resizeme"
						data-x="center"
						data-y="413"
						data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
						data-speed="800"
						data-start="1550"
						data-easing="easeOutQuad"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.01"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power4.easeIn" style="z-index: 3;">
						<a href="#purchase" class="btn btn-default btn-lg">
							<span>Purchase Smarty Now</span> 
						</a>
					</div>

				</li>

			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</section>
	<!-- /REVOLUTION SLIDER -->
	<section class="info-bar info-bar-clean">
		<div class="container">

			<div class="row">

				<div class="col-sm-4">
					<i class="glyphicon glyphicon-globe"></i>
					<h3>FULLY RESPONSIVE</h3>
					<p>Smarty Template is fully responsive</p>
				</div>

				<div class="col-sm-4">
					<i class="glyphicon glyphicon-usd"></i>
					<h3>ADMIN INCLUDED</h3>
					<p>Smarty Template include admin</p>
				</div>

				<div class="col-sm-4">
					<i class="glyphicon glyphicon-flag"></i>
					<h3>ONLINE SUPPORT 24/7</h3>
					<p>Free support via email</p>
				</div>

			</div>

		</div>
	</section>	
@endsection