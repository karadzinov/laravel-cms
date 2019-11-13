@extends($path.'master')
@section('optionalHead')
	<style>
		.product-cover-image{
			height: 388px;
			/*width: 291px;*/
			object-fit: cover;
		}

		.product-details-container{
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
		.radio-rating{
			display: inline;
			margin-right: 70px;
		}

		.stock-label{
			color: white !important;
			padding: 4px;
			border-radius: 10px;
			font-size: 15px;

		}
	</style>
@endsection
@section('content')
	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{{$product->name}}</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->

					<div class="row">
						<div class="col-md-4">
							<!-- pills start -->
							<!-- ================ -->
							<!-- Nav tabs -->
							<ul class="nav nav-pills" role="tablist">
								<li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="images"><i class="fa fa-camera pr-5"></i> Photo</a></li>
								@if($product->video)
								<li><a href="#pill-2" role="tab" data-toggle="tab" title="video"><i class="fa fa-video-camera pr-5"></i> Video</a></li>@endif
							</ul>
							<!-- Tab panes -->
							<div class="tab-content clear-style">
								<div class="tab-pane active" id="pill-1">
									<div class="owl-carousel content-slider-with-large-controls">
										<div class="overlay-container overlay-visible">
											<img class="product-cover-image" src="{{$product->originalPath . $product->main_image}}" alt="">
											<a href="{{$product->originalPath . $product->main_image}}" class="popup-img overlay-link" title="{{$product->name}}"><i class="icon-plus-1"></i></a>
										</div>
										@if($product->images->isNotEmpty())
											@foreach($product->images as $image)
												<div class="overlay-container overlay-visible">
													<img class="product-cover-image" src="{{$product->originalPath . $image->name}}" alt="">
													<a href="{{$product->originalPath . $image->name}}" class="popup-img overlay-link" title="{{$product->name}}"><i class="icon-plus-1"></i></a>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								<div class="tab-pane" id="pill-2">
									@if($product->video)
										<div class="embed-responsive embed-responsive-16by9">
											{!!$product->videoPreview!!}
										</div>
									@endif
								</div>
							</div>
							<!-- pills end -->
						</div>
						<div class="col-md-8 pv-30 product-details-container">
							<h2>
								{{trans('general.description')}} 
								@if($product->quantity===0)
									<span class="stock-label bg-danger pull-right"><i class="fa fa-remove"></i> {{trans('general.out-of-stock')}}</span>
								@else
									<span class="stock-label bg-success pull-right"><i class="fa fa-check"></i> {{trans('general.in-stock')}}</span>
								@endif
							</h2>
							{{$product->short_description}}
							<br><br>
							{!!$product->description!!}
							@if($product->tags->isNotEmpty())
								<footer class="clearfix">
									<div class="tags pull-left">
										@foreach($product->tags as $tag)
											<i class="icon-tags"></i> 
											<a href="{{route('tagPosts', $tag->name)}}">
												{{$tag->name}}
											</a>
										@endforeach
									</div>
								</footer>
							@endif
							<hr class="mb-10">
							<div class="clearfix mb-20">
								<span>
									@include($path.'partials/products/rating', ['count'=>$product->rating])
								</span>
								@if(auth()->user()->wishlist->contains($product))
									<span class="wishlist-button remove-from-wishlist" data-product="{{$product->id}}" title="{{trans('general.added-to-wishlist')}}"><i class="fa fa-heart in-wishlist"></i></span>
								@else
									<span class="wishlist-button add-to-wishlist" data-product="{{$product->id}}"><i class="fa fa-heart-o" title="{{trans('general.add-to-wishlist')}}"></i></span>
								@endif
								</a>
								@include($path.'/partials/share')
							</div>
							<div class="row grid-space-10">
								<form role="form" class="clearfix" id="buy-now-form" action="{{route('purchases.buyNow')}}" method="GET">
									<input type="hidden" value="{{$product->id}}" name="product_id">
									<div class="col-md-4">
										<div class="form-group">
											<label>{{trans('general.quantity')}}</label>
											<input id="product-quantity" name="quantity" type="number" class="form-control" value="1">
										</div>
									</div>
									{{-- <div class="col-md-4">
										<div class="form-group">
											<label>Color</label>
											<select class="form-control">
												<option>Red</option>
												<option>White</option>
												<option>Black</option>
												<option>Blue</option>
												<option>Orange</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Size</label>
											<select class="form-control">
												<option>5.3"</option>
												<option>5.7"</option>
											</select>
										</div>
									</div> --}}
									<div class="col-md-12 text-right">
										
									</div>
								</form>
							</div>
							<div class="light-gray-bg p-20 bordered clearfix">
								<span class="product price"><i class="icon-tag pr-10"></i>
									@if($product->reduction)
										<s class="small text-muted">{{$product->price.$currency}}</s>
										 {{$product->reductedPrice.$currency}}
									@else
										 {{$product->price.$currency}}
									@endif
								</span>

								{{-- <span class="product price"><i class="icon-tag pr-10"></i>$99.00</span> --}}
								
								<div class="product elements-list pull-right clearfix">
									@if(auth()->user()->cart->contains($product))
										<a href="{{route('cart.cart')}}" class="margin-clear btn btn-default">
											<i class="fa fa-lg fa-cart-plus"></i>
											  &nbsp{{trans('general.already-in-cart')}}
										</a>
									@else
										<button id="add-to-cart" class="margin-clear btn btn-default">
											<i class="fa fa-lg fa-cart-plus"></i>
											  &nbsp{{trans('general.add-to-cart')}}
										</button>
									@endif
									<button id="buy-now" type="submit" class="margin-clear btn btn-default">
										<i class="fa fa-lg fa-cart-arrow-down"></i>
										  &nbsp{{trans('general.buy')}}
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-30 light-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs style-4" role="tablist">
						{{-- <li class="active"><a href="#h2tab2" role="tab" data-toggle="tab"><i class="fa fa-files-o pr-5"></i>Specifications</a></li> --}}
						<li class="active"><a href="#h2tab3" role="tab" data-toggle="tab"><i class="fa fa-star pr-5"></i>({{$product->reviews->count()}}) {{trans('general.reviews')}}</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content padding-top-clear padding-bottom-clear">
						{{-- <div class="tab-pane fade in active" id="h2tab2">
							<h4 class="space-top">Specifications</h4>
							<hr>
							<dl class="dl-horizontal">
								<dt>Consectetur</dt>
								<dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</dd>
								<dt>Culla</dt>
								<dd>Adipisci autem illo hic itaque nulla velit quod laboriosam ipsum in illum!</dd>
								<dt>Quas</dt>
								<dd>Velit mollitia vel nemo, repudiandae quas nisi consectetur maiores beatae.</dd>
								<dt>Sapiente</dt>
								<dd>Dolor, architecto, accusamus. Explicabo, culpa hic sapiente amet libero, recusandae laudantium consequatur velit possimus ratione quo. Ipsum maxime officia quasi quos magni!</dd>
								<dt>Dignissimos</dt>
								<dd>Odio cum deleniti mollitia, quisquam dignissimos voluptatem, unde rem alias.</dd>
								<dt>Adipisicing</dt>
								<dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</dd>
								<dd>Tempora rerum veritatis nam blanditiis.</dd>
								<dt>Werspiciatis</dt>
								<dd>Rem nostrum sit magnam debitis quidem perspiciatis fuga fugit.</dd>
							</dl>
							<hr>
						</div> --}}
						<div class="tab-pane fade in active" id="h2tab3">
							<!-- comments start -->
							<div class="comments margin-clear space-top">
								@foreach($product->reviews as $review)
									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img class="img-circle" src="{{$review->user->image}}" alt="avatar">
										</div>
										<header>
											<h3>{{$review->user->name}}</h3>
											<div class="comment-meta"> 
												@include($path.'partials/products/rating', ['count'=>$review->rating])
											 | {{$review->updated_at->format('d m Y, H:i')}}</div>
										</header>
										<div class="comment-content">
											<div class="comment-body clearfix">
												<p>{{$review->content}}</p>
											</div>
										</div>
									</div>
									<!-- comment end -->
								@endforeach
							</div>
							<!-- comments end -->
							@if($canWriteReview)
								<!-- comments form start -->
								<div class="comments-form">
									<h2 class="title">{{trans('general.add-review')}}</h2>
									<form action="{{route('products.storeReview')}}" method="POST" id="review-form">
										@csrf
										<div class="form-group has-feedback">
											<label for="name4">{{trans('general.name')}}</label>
											<input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}" readonly="">
											<i class="fa fa-user form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="email">{{trans('general.email')}}</label>
											<input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}" readonly="">
											<i class="icon-mail form-control-feedback"></i>
										</div>
										<div class="form-group">
											<!-- Stars -->
											<div class="product-star-vote clearfix">

												<label for="rating">{{trans('general.your-note')}}</label><br>
												@for($i=1; $i<=5;$i++)
													<label class="radio-rating">
														<input type="radio" name="rating" value="{{$i}}" @if(old('rating')==$i) checked="true" @endif/>
														<i></i> {{$i}} <span class="fa fa-star"></span>
													</label>
												@endfor
											</div>
											@if($errors->first('rating'))
												<div class="alert alert-danger">
													{{$errors->first('rating')}}
												</div>
											@endif
										</div>
										<div class="form-group has-feedback">
											<label for="content">{{trans('general.message')}}</label>
											<textarea name="content" id="text" class="form-control" rows="6" placeholder="{{trans('general.content')}}" maxlength="1000">{{old('content')}}</textarea>
											<i class="fa fa-envelope-o form-control-feedback"></i>
										</div>
										@if($errors->first('content'))
											<div class="alert alert-danger">
												{{$errors->first('content')}}
											</div>
										@endif
										<input type="hidden" name="product_id" value="{{$product->id}}">

										<button type="submit" id="submit-review-form" class="btn btn-default"><i class="fa fa-check"></i> {{trans('general.send-review')}}</button>
									</form>
								</div>
								<!-- comments form end -->
							@endif
						</div>
					</div>
				</div>

				<!-- sidebar start -->
				<!-- ================ -->
				<aside class="col-md-4 col-lg-3 col-lg-offset-1">
					<div class="sidebar">
						<div class="block clearfix">
							<h3 class="title">Related Products</h3>
							<div class="separator-2"></div>
							<div class="media margin-clear">
								<div class="media-left">
									<div class="overlay-container">
										<img class="media-object" src="{{asset('assets/theme-1/images/product-5.jpg')}}" alt="blog-thumb">
										<a href="shop-product.html" class="overlay-link small"><i class="fa fa-link"></i></a>
									</div>
								</div>
								<div class="media-body">
									<h6 class="media-heading"><a href="shop-product.html">Lorem ipsum dolor sit amet</a></h6>
									<p class="margin-clear">
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
									</p>
									<p class="price">$99.00</p>
								</div>
								<hr>
							</div>
							<div class="media margin-clear">
								<div class="media-left">
									<div class="overlay-container">
										<img class="media-object" src="{{asset('assets/theme-1/images/product-6.jpg')}}" alt="blog-thumb">
										<a href="shop-product.html" class="overlay-link small"><i class="fa fa-link"></i></a>
									</div>
								</div>
								<div class="media-body">
									<h6 class="media-heading"><a href="shop-product.html">Eum repudiandae ipsam</a></h6>
									<p class="margin-clear">
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star"></i>
									</p>
									<p class="price">$299.00</p>
								</div>
								<hr>
							</div>
							<div class="media margin-clear">
								<div class="media-left">
									<div class="overlay-container">
										<img class="media-object" src="{{asset('assets/theme-1/images/product-7.jpg')}}" alt="blog-thumb">
										<a href="shop-product.html" class="overlay-link small"><i class="fa fa-link"></i></a>
									</div>
								</div>
								<div class="media-body">
									<h6 class="media-heading"><a href="shop-product.html">Quia aperiam velit fuga</a></h6>
									<p class="margin-clear">
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star"></i>
									</p>
									<p class="price">$9.99</p>
								</div>
								<hr>
							</div>
							<div class="media margin-clear">
								<div class="media-left">
									<div class="overlay-container">
										<img class="media-object" src="{{asset('assets/theme-1/images/product-8.jpg')}}" alt="blog-thumb">
										<a href="shop-product.html" class="overlay-link small"><i class="fa fa-link"></i></a>
									</div>
								</div>
								<div class="media-body">
									<h6 class="media-heading"><a href="shop-product.html">Fugit non natus officiis</a></h6>
									<p class="margin-clear">
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star text-default"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</p>
									<p class="price">$399.00</p>
								</div>
							</div>
						</div>
					</div>
				</aside>
				<!-- sidebar end -->

			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="section dark-translucent-bg pv-40" style="background-image:url('images/shop-banner.jpg');background-position: 50% 50%;">
		<div class="container">
			<div class="row grid-space-10">
				<div class="col-md-3 col-sm-6">
					<div class="pv-30 ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
						<span class="icon default-bg"><i class="fa fa-diamond"></i></span>
						<h3>Premium &amp; Guaranteed Quality</h3>
						<div class="separator clearfix"></div>
						<p>Voluptatem ad provident non repudiandae beatae cupiditate.</p>
						<a href="page-services.html" class="link-dark">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="pv-30 ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="150">
						<span class="icon default-bg"><i class="icon-lock"></i></span>
						<h3>Secure &amp; Safe Payment</h3>
						<div class="separator clearfix"></div>
						<p>Iure sequi unde hic. Sapiente quaerat sequi inventore.</p>
						<a href="page-services.html" class="link-dark">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="clearfix visible-sm"></div>
				<div class="col-md-3 col-sm-6">
					<div class="pv-30 ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
						<span class="icon default-bg"><i class="icon-globe"></i></span>
						<h3 class="pl-10 pr-10">Free &amp; Fast Shipping</h3>
						<div class="separator clearfix"></div>
						<p>Inventore dolores aut laboriosam cum consequuntur.</p>
						<a href="page-services.html" class="link-dark">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="pv-30 ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="250">
						<span class="icon default-bg"><i class="icon-thumbs-up"></i></span>
						<h3>24/7 Customer Support</h3>
						<div class="separator clearfix"></div>
						<p>Inventore dolores aut laboriosam cum consequuntur.</p>
						<a href="page-services.html" class="link-dark">Read More<i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action text-center">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2 class="title"><strong>Subscribe</strong> To Our Newsletter</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus error pariatur deserunt laudantium nam, mollitia quas nihil inventore, quibusdam?</p>
								<div class="separator"></div>
								<form class="form-inline margin-clear">
									<div class="form-group has-feedback">
										<label class="sr-only" for="subscribe3">Email address</label>
										<input type="email" class="form-control form-control-lg" id="subscribe3" placeholder="Enter email" name="subscribe3" required="">
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<button type="submit" class="btn btn-lg btn-gray-transparent btn-animated margin-clear">Submit <i class="fa fa-send"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->
@endsection

@section('optionalScripts')
	<script>
		$(document).ready(function(){
			$('#buy-now').on('click', function(){
				$('#buy-now-form').submit();
			});

			$('#add-to-cart').on('click', function(){
				const quantity = $('#product-quantity').val();
				const product_id = {{$product->id}};
				let element = $(this);

				 $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			        }
			    });
				$.ajax({

				   type:'POST',
				   url:'{{route('cart.addToCart')}}',
				   data:{
				   		quantity,
				   		product_id
				   },
				   success:function(response){
				   	
				   	if(response.status === "already-added"){
				   		flashMessage("succcess", response.message);
				   		return;
				   	}
				   	
				   	flashMessage("success", response.message);
				   	element.html("{{trans('general.added-to-cart')}} <i class='fa fa-check'></i>");

				   },
				   error:function(response){
				   	
				   		flashMessage("danger", response.message);
				   }

				});
			});
		});
	</script>
@endsection