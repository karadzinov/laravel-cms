<!-- SLIDE TOP -->
<div id="slidetop">

	<div class="container">
		
		<div class="row">

			<div class="col-md-4">
				<h6 class="uppercase"><i class="icon-heart"></i> {{trans('general.why')}} {{$settings->title}}?</h6>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. </p>
			</div>

			<div class="col-md-4">
				<h6><i class="fa-facheck"></i> {{trans('general.most-visited')}}</h6>
				<ul class="list-unstyled">
					<li><a href="{{route('public.home')}}"><i class="fa fa-angle-right"></i> {{trans('general.our-home')}}</a></li>
					<li><a href="{{route('posts.index')}}"><i class="fa fa-angle-right"></i> {{trans('general.our-posts')}} </a></li>
					<li><a href="{{route('about')}}"><i class="fa fa-angle-right"></i> {{trans('general.our-about')}}</a></li>
					<li><a href="{{route('search')}}"><i class="fa fa-angle-right"></i> {{trans('general.our-search-results')}}</a></li>
					<li><a href="{{route('contact')}}"><i class="fa fa-angle-right"></i> {{trans('general.our-contact')}}</a></li>
				</ul>
			</div>

			<div class="col-md-4">
				<h6 class="uppercase"><i class="icon-envelope"></i> {{trans('general.contact-info')}}</h6>
				<ul class="list-unstyled">
					<li>
						<b>{{trans('general.address')}}:</b> {{$settings->address}}
					</li>
					<li><b>{{trans('general.phone')}}:</b> {{$settings->phone_number}}</li>
					<li><b>{{trans('general.email')}}:</b> <a href="mailto:{{$settings->email}}">{{$settings->email}}</a></li>
				</ul>
			</div>

		</div>

	</div>

	<a class="slidetop-toggle" href="#"><!-- toggle button --></a>

</div>
<!-- /SLIDE TOP -->