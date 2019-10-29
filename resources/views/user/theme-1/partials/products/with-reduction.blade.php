<div class="col-md-6 masonry-grid-item">
	<div class="listing-item bordered light-gray-bg mb-20">
		<div class="row grid-space-0">
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="overlay-container">
					<img class="product-thumbnail" src="{{$product->thumbnailPath}}" alt="">
					<a class="overlay-link popup-img-single" href="{{$product->originalPath}}"><i class="fa fa-search-plus"></i></a>
					<span class="badge">{{$product->reduction}}% OFF</span>
				</div>
			</div>
			<div class="col-sm-6 col-md-8 col-lg-9">
				<div class="body">
					<h3 class="margin-clear"><a href="{{$product->showRoute}}">{{$product->name}}</a></h3>
					<p>
						<i class="fa fa-star text-default"></i>
						<i class="fa fa-star text-default"></i>
						<i class="fa fa-star text-default"></i>
						<i class="fa fa-star text-default"></i>
						<i class="fa fa-star"></i>
					</p>
					<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
					<div class="elements-list clearfix">
						<span class="price"><del>{{$product->price.$currency}}</del> {{$product->reductedPrice.$currency}}</span>
						<a href="#" class="pull-right btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>