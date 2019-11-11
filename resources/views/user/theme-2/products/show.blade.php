@extends($path.'master')
@section('optionalHead')
	<link href="{{asset('assets/theme-2/css/layout-shop.css')}}" rel="stylesheet" type="text/css" />

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
		#header.translucent + section.page-header{
			margin-top: 0;
			padding: 180px 0 100px 0;
		}
	</style>
@endsection
@section('content')
	<section class="page-header page-header-xs">
		<div class="container">

			<h1>{{$product->name}}</h1>

		</div>
	</section>
	<section>
		<div class="container">
			
			<div class="row">
			
				<!-- IMAGE -->
				<div class="col-lg-4 col-sm-4">
					<div class="thumbnail relative mb-3">
						 
						<figure id="zoom-primary" class="zoom" data-mode="mouseover">
							<!-- 
								zoom buttton
								
								positions available:
									.bottom-right
									.bottom-left
									.top-right
									.top-left
							-->
							<a class="lightbox bottom-right" href="{{$product->originalPath . $product->main_image}}" data-plugin-options='{"type":"image"}'><i class="fa fa-search"></i></a>

							<!-- 
								image 
								
								Extra: add .image-bw class to force black and white!
							-->
							<img class="img-fluid" src="{{$product->originalPath . $product->main_image}}" width="1200" height="1500" alt="This is the product title" />
						</figure>

					</div>
				</div>
				<!-- /IMAGE -->

				<!-- ITEM DESC -->
				<div class="col-lg-5 col-sm-8">

					<!-- buttons -->
					<div class="float-right">
						<!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
						<a class="btn btn-light add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart p-0"></i></a>
					</div>
					<!-- /buttons -->

					<!-- price -->
					<div class="shop-item-price">
						@if($product->reduction)
							<span class="line-through pl-0">{{$product->price.$currency}}</span>
						@endif
						{{$product->currentPrice.$currency}}
					</div>
					<!-- /price -->

					<hr />

					<div class="clearfix mb-30">
						@if(!$product->quantity)
							<span class="float-right text-danger"><i class="fa fa-remove"></i> {{trans('general.out-of-stock')}}</span>
						@else
							<span class="float-right text-success"><i class="fa fa-check"></i> {{trans('general.in-stock')}}</span>
						@endif

					</div>


					<!-- short description -->
					<p>{{$product->short_description}}</p>
					<!-- /short description -->
					<hr />
					{{-- gallery --}}
					@if($product->images->isNotEmpty())
						<div class="masonry-gallery columns-2 clearfix lightbox" data-img-big="3" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>
							@foreach($product->images as $image)
								<a class="image-hover" href="{{$product->originalPath.$image->name}}">
									<img src="{{$product->thumbnailPath.$image->name}}" alt="...">
								</a>
							@endforeach
						</div>
					@endif
					
					<hr />
					
					<label>{{trans('general.quantity')}}</label>
					<div class="row">
						<div class="col-md-3">
							<form role="form" class="clearfix" id="buy-now-form" action="{{route('purchases.buyNow')}}" method="GET">
								<input type="hidden" value="{{$product->id}}" name="product_id">
									<div class="form-group">
										<input id="product-quantity" name="quantity" type="number" class="form-control" value="1">
									</div>
							</form>
						</div>
						<div class="col-md-9">
							<div class="product elements-list pull-right clearfix">
								@if(auth()->user()->cart->contains($product))
									<a href="{{route('cart.cart')}}" class="btn-lg btn btn-default">
										<i class="fa fa-lg fa-cart-plus"></i>
										  &nbsp{{trans('general.already-in-cart')}}
									</a>
								@else
									<button id="add-to-cart" class="btn-lg btn btn-default">
										<i class="fa fa-lg fa-cart-plus"></i>
										  &nbsp{{trans('general.add-to-cart')}}
									</button>
								@endif
								<button id="buy-now" type="submit" class="btn-lg btn btn-default">
									<i class="fa fa-lg fa-cart-arrow-down"></i>
									  &nbsp{{trans('general.buy')}}
								</button>
							</div>
						</div>
					</div>


					<hr />

					<!-- Share -->
					<div class="float-right">

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook float-left" data-toggle="tooltip" data-placement="top" title="Facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter float-left" data-toggle="tooltip" data-placement="top" title="Twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-gplus float-left" data-toggle="tooltip" data-placement="top" title="Google plus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>

						<a href="#" class="social-icon social-icon-sm social-icon-transparent social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
							<i class="icon-linkedin"></i>
							<i class="icon-linkedin"></i>
						</a>

					</div>
					<!-- /Share -->


					<!-- rating -->
					<div class="rating rating-4 fs-13 mt-10 fw-100"><!-- rating-0 ... rating-5 --></div>
					<!-- /rating -->

				</div>
				<!-- /ITEM DESC -->

				<!-- INFO -->
				<div class="col-sm-4 col-md-3">

					<h4 class="fs-18">
						<i class="fa fa-paper-plane-o"></i> 
						FREE SHIPPING
					</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla.</p>

					<h4 class="fs-18">
						<i class="fa fa-clock-o"></i>
						30 DAYS MONEY BACK
					</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla.</p>

					<h4 class="fs-18">
						<i class="fa fa-users"></i> 
						CUSTOMER SUPPORT
					</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla.</p>

					<hr>

					<p class="fs-11">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
					</p>
				</div>
				<!-- /INFO -->

			</div>



			<ul id="myTab" class="nav nav-tabs nav-top-border mt-80" role="tablist">
				<li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab">{{trans('general.description')}}</a></li>
				<li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab">Reviews (2)</a></li>
			</ul>


			<div class="tab-content pt-20">

				<!-- DESCRIPTION -->
				<div role="tabpanel" class="tab-pane active" id="description">
					{!!$product->description!!}
				</div>
				
				<!-- REVIEWS -->
				<div role="tabpanel" class="tab-pane fade" id="reviews">
					<!-- REVIEW ITEM -->
					<div class="block mb-60">

						<span class="user-avatar"><!-- user-avatar -->
							<img class="float-left media-object" src="assets/images/_smarty/avatar2.jpg" width="64" height="64" alt="">
						</span>

						<div class="media-body">
							<h4 class="media-heading fs-14">
								John Doe &ndash; 
								<span class="text-muted">June 29, 2014 - 11:23</span> &ndash;
								<span class="fs-14 text-muted"><!-- stars -->
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</span>
							</h4>
							
							<p>
								Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
							</p>

						</div>

					</div>
					<!-- /REVIEW ITEM -->

					<!-- REVIEW ITEM -->
					<div class="block mb-60">

						<span class="user-avatar"><!-- user-avatar -->
							<img class="float-left media-object" src="assets/images/_smarty/avatar2.jpg" width="64" height="64" alt="">
						</span>

						<div class="media-body">
							<h4 class="media-heading fs-14">
								John Doe &ndash; 
								<span class="text-muted">June 29, 2014 - 11:23</span> &ndash;
								<span class="fs-14 text-muted"><!-- stars -->
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</span>
							</h4>
							
							<p>
								Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
							</p>

						</div>

					</div>
					<!-- /REVIEW ITEM -->


					<!-- REVIEW FORM -->
					<h4 class="page-header mb-40">ADD A REVIEW</h4>
					<form method="post" action="#" id="form">
						
						<div class="row mb-10">
							
							<div class="col-md-6 mb-10">
								<!-- Name -->
								<input type="text" name="name" id="name" class="form-control" placeholder="Name *" maxlength="100" required="">
							</div>
							
							<div class="col-md-6">
								<!-- Email -->
								<input type="email" name="email" id="email" class="form-control" placeholder="Email *" maxlength="100" required="">
							</div>
							
						</div>
						
						<!-- Comment -->
						<div class="mb-30">
							<textarea name="text" id="text" class="form-control" rows="6" placeholder="Comment" maxlength="1000"></textarea>
						</div>

						<!-- Stars -->
						<div class="product-star-vote clearfix">

							<label class="radio float-left">
								<input type="radio" name="product-review-vote" value="1" />
								<i></i> 1 Star
							</label>

							<label class="radio float-left">
								<input type="radio" name="product-review-vote" value="2" />
								<i></i> 2 Stars
							</label>

							<label class="radio float-left">
								<input type="radio" name="product-review-vote" value="3" />
								<i></i> 3 Stars
							</label>

							<label class="radio float-left">
								<input type="radio" name="product-review-vote" value="4" />
								<i></i> 4 Stars
							</label>

							<label class="radio float-left">
								<input type="radio" name="product-review-vote" value="5" />
								<i></i> 5 Stars
							</label>

						</div>

						<!-- Send Button -->
						<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Send Review</button>
						
					</form>
					<!-- /REVIEW FORM -->

				</div>
			</div>


			<hr class="mt-80 mb-80" />


			<!-- RELATED -->
			{{-- <h2 class="owl-featured"><strong>Related</strong> products:</h2>
			<div class="owl-carousel featured m-0 owl-padding-10" data-plugin-options='{"singleItem": false, "items": "5", "stopOnHover":false, "autoPlay":4500, "autoHeight": false, "navigation": true, "pagination": false}'>

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p13.jpg')}}" alt="shop first image" />
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p14.jpg')}}" alt="shop hover image" />
						</a>
						<!-- /product image(s) -->

						<!-- product more info -->
						<div class="shop-item-info">
							<span class="badge badge-success">NEW</span>
							<span class="badge badge-danger">SALE</span>
						</div>
						<!-- /product more info -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Cotton 100% - Pink Shirt</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-4 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							<span class="line-through">$98.00</span>
							$78.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<!-- CAROUSEL -->
							<div class="owl-carousel owl-padding-0 m-0" data-plugin-options='{"singleItem": true, "autoPlay": 3000, "navigation": false, "pagination": false, "transitionStyle":"fadeUp"}'>
								<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p5.jpg')}}" alt="">
								<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p1.jpg')}}" alt="">
							</div>
							<!-- /CAROUSEL -->
						</a>
						<!-- /product image(s) -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Pink Dress 100% Cotton</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-4 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							$44.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p2.jpg')}}" alt="shop first image" />
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p12.jpg')}}" alt="shop hover image" />
						</a>
						<!-- /product image(s) -->

						<!-- product more info -->
						<div class="shop-item-info">
							<span class="badge badge-success">NEW</span>
							<span class="badge badge-danger">SALE</span>
						</div>
						<!-- /product more info -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Black Fashion Hat</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-4 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							<span class="line-through">$77.00</span>
							$65.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p8.jpg')}}" alt="shop first image" />
						</a>
						<!-- /product image(s) -->

						<!-- countdown -->
						<div class="shop-item-counter">
							<div class="countdown" data-from="December 31, 2020 08:22:01" data-labels="years,months,weeks,days,hour,min,sec"><!-- Example Date From: December 31, 2018 15:03:26 --></div>
						</div>
						<!-- /countdown -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Beach Black Lady Suit</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-4 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							$56.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p7.jpg')}}" alt="shop first image" />
						</a>
						<!-- /product image(s) -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Town Dress - Black</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-4 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							$154.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p6.jpg')}}" alt="shop first image" />
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p14.jpg')}}" alt="shop hover image" />
						</a>
						<!-- /product image(s) -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Chick Lady Fashion</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-4 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							$167.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

				<!-- item -->
				<div class="shop-item m-0">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" href="shop-single-left.html">
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p11.jpg')}}" alt="shop hover image" />
							<img class="img-fluid" src="{{asset('assets/theme-1/demo_files/images/shop/products/300x450/p3.jpg')}}" alt="shop first image" />
						</a>
						<!-- /product image(s) -->
					</div>
					
					<div class="shop-item-summary text-center">
						<h2>Black Long Lady Shirt</h2>
						
						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-0 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">
							$128.00
						</div>
						<!-- /price -->
					</div>

						<!-- buttons -->
						<div class="shop-item-buttons text-center">
							<a class="btn btn-light" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
						</div>
						<!-- /buttons -->
				</div>
				<!-- /item -->

			</div>
			<!-- /RELATED --> --}}

		</div>
	</section>
	<!-- / -->
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