	<!-- banner start -->
<!-- ================ -->
<div class="banner clearfix">

	<!-- slideshow start -->
	<!-- ================ -->
	<div class="slideshow">
		
		<!-- slider revolution start -->
		<!-- ================ -->
		<div class="slider-banner-container">
			<div class="slider-banner-fullscreen">
				<ul class="slides">
					@foreach($slides as $slide)
						@if($loop->iteration===1)
							<!-- slide 1 start -->
							<!-- ================ -->
							<li data-transition="random-static" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="{{$slide->title}}">
							
							<!-- main image -->
							<img src="{{$slide->originalPath}}" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">
							
							<!-- Transparent Background -->
							<div class="tp-caption dark-translucent-bg"
								data-x="center"
								data-y="bottom"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="0">
							</div>

							<!-- LAYER NR. 1 -->
							<div class="tp-caption sfr stl xlarge_white"
								data-x="center"
								data-y="70"
								data-speed="200"
								data-easing="easeOutQuad"
								data-start="1000"
								data-end="2500"
								data-splitin="chars"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
								data-splitout="chars">{{$slide->title}}
							</div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption sfl str xlarge_white"
								data-x="center"
								data-y="70"
								data-speed="200"
								data-easing="easeOutQuad"
								data-start="2500"
								data-end="4000"
								data-splitin="chars"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
								data-splitout="chars">{{$slide->title}}
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption sfr stt xlarge_white"
								data-x="center"
								data-y="70"
								data-speed="200"
								data-easing="easeOutQuad"
								data-start="4000"
								data-end="6000"
								data-splitin="chars"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
								data-splitout="chars"
								data-endspeed="400">{{$slide->title}}
							</div>					

							<!-- LAYER NR. 4 -->
							<div class="tp-caption sft fadeout text-center large_white"
								data-x="center"
								data-y="70"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="6400"
								data-end="10000"> <img src="{{asset('images/settings/thumbnails/'.$settings->logo)}}" alt=""> <br> 
								<span class="logo-font">{{$settings->title}}</span>
							</div>	

							{{-- <!-- LAYER NR. 5 -->
							<div class="tp-caption sfr fadeout"
								data-x="center"
								data-y="210"
								data-hoffset="-232"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="1000"
								data-end="5500"><span class="icon large circle"><i class="circle icon-lightbulb"></i></span>
							</div>

							<!-- LAYER NR. 6 -->
							<div class="tp-caption sfl fadeout"
								data-x="center"
								data-y="210"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="2500"
								data-end="5500"><span class="icon large circle"><i class="circle icon-arrows-ccw"></i></span>
							</div>

							<!-- LAYER NR. 7 -->
							<div class="tp-caption sfr fadeout"
								data-x="center"
								data-y="210"
								data-hoffset="232"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="4000"
								data-end="5500"><span class="icon large circle"><i class="circle icon-chart-line"></i></span>
							</div>

							<!-- LAYER NR. 8 -->
							<div class="tp-caption ZoomIn fadeout text-center tp-resizeme large_white"
								data-x="center"
								data-y="170"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="6400"
								data-end="10000"><div class="separator light"></div>
							</div> --}}	

							<!-- LAYER NR. 9 -->
							<div class="tp-caption sft fadeout medium_white text-center"
								data-x="center"
								data-y="250"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="2500"
								data-end="10000"
								data-endspeed="600">{{$settings->slogan}}
							</div>

							<!-- LAYER NR. 10 -->
							<div class="tp-caption fade fadeout"
								data-x="center"
								data-y="bottom"
								data-voffset="100"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="2000"
								data-end="10000"
								data-endspeed="200">
								<a href="#page-start" class="btn btn-lg moving smooth-scroll"><i class="icon-down-open-big"></i><i class="icon-down-open-big"></i><i class="icon-down-open-big"></i></a>
							</div>
							</li>
							<!-- slide 1 end -->
						@elseif($loop->iteration%2 === 0)
							<!-- slide 2 start -->
							<!-- ================ -->
							<li data-transition="random-static" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="{{$slide->title}}">
							
							<!-- main image -->
							<img src="{{$slide->originalPath}}" alt="slidebg2" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">

							<!-- Transparent Background -->
							<div class="tp-caption dark-translucent-bg"
								data-x="center"
								data-y="bottom"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="0">
							</div>
							
							@if($slide->top_title)
								<!-- LAYER NR. 1 -->
								<div class="tp-caption sfb fadeout text-white"
									data-x="right"
									data-y="0"
									data-speed="500"
									data-start="600"
									data-easing="easeOutQuad"
									data-end="10000">{{$slide->top_title}}
								</div>
							@endif

							<!-- LAYER NR. 1 -->
							<div class="tp-caption sfb fadeout large_white"
								data-x="right"
								data-y="70"
								data-speed="500"
								data-start="1000"
								data-easing="easeOutQuad"
								data-end="10000"><span class="logo-font">{{$slide->title}}</span>
							</div>	

							<!-- LAYER NR. 2 -->
							<div class="tp-caption sfb fadeout text-right medium_white"
								data-x="right"
								data-y="200" 
								data-speed="500"
								data-start="1300"
								data-easing="easeOutQuad"
								data-endspeed="600">{{$slide->subtitle}}
							</div>

							{{-- <!-- LAYER NR. 3 -->
							<div class="tp-caption sfb fadeout text-right medium_white"
								data-x="right"
								data-y="260" 
								data-speed="500"
								data-start="1600"
								data-easing="easeOutQuad"
								data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-check"></i></span> Bootstrap Based
							</div>

							LAYER NR. 4
							<div class="tp-caption sfb fadeout text-right medium_white"
								data-x="right"
								data-y="320" 
								data-speed="500"
								data-start="1900"
								data-easing="easeOutQuad"
								data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-gift"></i></span> Packed Full of Features
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption sfb fadeout text-right medium_white"
								data-x="right"
								data-y="380" 
								data-speed="500"
								data-start="2200"
								data-easing="easeOutQuad"
								data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-hourglass"></i></span> Very Easy to Customize
							</div> --}}

							@if($slide->link)
								<!-- LAYER NR. 6 -->
								<div class="tp-caption sfb fadeout small_white"
									data-x="right"
									data-y="300"
									data-speed="500"
									data-start="2500"
									data-easing="easeOutQuad"
									data-endspeed="600"><a href="{{$slide->link}}" class="btn btn-default btn-lg btn-animated">{{trans('general.more')}} <i class="fa fa-cart-arrow-down"></i></a>
								</div>
							@endif
							</li>
							<!-- slide 2 end -->
						@else
							<!-- slide 2 start -->
							<!-- ================ -->
							<li data-transition="random-static" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="{{$slide->title}}">
							
							<!-- main image -->
							<img src="{{$slide->originalPath}}" alt="slidebg2" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">

							<!-- Transparent Background -->
							<div class="tp-caption dark-translucent-bg"
								data-x="center"
								data-y="bottom"
								data-speed="500"
								data-easing="easeOutQuad"
								data-start="0">
							</div>
							@if($slide->top_title)
								<!-- LAYER NR. 1 -->
								<div class="tp-caption sfb fadeout text-white"
									data-x="left"
									data-y="0"
									data-speed="500"
									data-start="600"
									data-easing="easeOutQuad"
									data-end="10000">{{$slide->top_title}}
								</div>
							@endif
							<!-- LAYER NR. 1 -->
							<div class="tp-caption sfb fadeout large_white"
								data-x="left"
								data-y="70"
								data-speed="500"
								data-start="1000"
								data-easing="easeOutQuad"
								data-end="10000"><span class="logo-font">{{$slide->title}}</span>
							</div>	

							<!-- LAYER NR. 2 -->
							<div class="tp-caption sfb fadeout text-left medium_white"
								data-x="left"
								data-y="200" 
								data-speed="500"
								data-start="1300"
								data-easing="easeOutQuad"
								data-endspeed="600">{{$slide->subtitle}}
							</div>

							{{-- <!-- LAYER NR. 3 -->
							<div class="tp-caption sfb fadeout text-left medium_white"
								data-x="left"
								data-y="260" 
								data-speed="500"
								data-start="1600"
								data-easing="easeOutQuad"
								data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-check"></i></span> Bootstrap Based
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption sfb fadeout text-left medium_white"
								data-x="left"
								data-y="320" 
								data-speed="500"
								data-start="1900"
								data-easing="easeOutQuad"
								data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-gift"></i></span> Packed Full of Features
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption sfb fadeout text-left medium_white"
								data-x="left"
								data-y="380" 
								data-speed="500"
								data-start="2200"
								data-easing="easeOutQuad"
								data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-hourglass"></i></span> Very Easy to Customize
							</div> --}}

							@if($slide->link)
								<!-- LAYER NR. 6 -->
								<div class="tp-caption sfb fadeout small_white"
									data-x="left"
									data-y="300"
									data-speed="500"
									data-start="2500"
									data-easing="easeOutQuad"
									data-endspeed="600"><a href="{{$slide->link}}" class="btn btn-default btn-lg btn-animated">{{trans('general.more')}} <i class="fa fa-cart-arrow-down"></i></a>
								</div>
							@endif
							</li>
							<!-- slide 2 end -->
						@endif
					@endforeach
					

					
				</ul>
				<div class="tp-bannertimer"></div>
			</div>
		</div>
		<!-- slider revolution end -->

	</div>
	<!-- slideshow end -->

</div>
<!-- banner end -->