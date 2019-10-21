<!-- LAYER SLIDER -->
<section class="alternate">
	<div class="container slider">
		<div class="layerslider" style="height:550px; width:1200px">
            @foreach($about->images as $image)
				<div class="ls-slide" data-ls="duration:1000;transitionorigami:true;overflow:true;kenburnsscale:1.2;">
					<img {{-- width="1200" height="800" --}} src="{{$about->originalPath . $image->name}}" class="ls-bg" alt="" sizes="(max-width: 1920px) 100vw, 1920px" />
				</div>
            @endforeach
		</div>
	</div>
</section>
<!-- /LAYER SLIDER -->