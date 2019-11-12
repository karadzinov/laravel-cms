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
						@if(auth()->user()->wishlist->contains($product))
							<a href="javascript:void(0)" class="btn btn-light wishlist-button remove-from-wishlist" data-product="{{$product->id}}" title="{{trans('general.added-to-wishlist')}}"><i class="fa fa-heart in-wishlist p-0"></i></a>
						@else
							<a href="javascript:void(0)" class="btn btn-light wishlist-button add-to-wishlist" data-product="{{$product->id}}" title="{{trans('general.add-to-wishlist')}}"><i class="fa fa-heart-o p-0"></i></a>
						@endif
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
					<div class="rating rating-{{$product->rating}} fs-13 mt-10 fw-100"><!-- rating-0 ... rating-5 --></div>
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
				<li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab">{{trans('general.reviews')}} ({{$product->reviews->count()}})</a></li>
			</ul>


			<div class="tab-content pt-20">

				<!-- DESCRIPTION -->
				<div role="tabpanel" class="tab-pane active" id="description">
					{!!$product->description!!}
				</div>
				
				<!-- REVIEWS -->
				<div role="tabpanel" class="tab-pane fade" id="reviews">
					@foreach($product->reviews as $review)
						<!-- REVIEW ITEM -->
						<div class="block mb-60">

							<span class="user-avatar"><!-- user-avatar -->
								<img class="float-left media-object" src="{{$review->user->image}}" width="64" height="64" alt="">
							</span>

							<div class="media-body">
								<h4 class="media-heading fs-14">
									{{$review->user->name}} &ndash; 
									<span class="text-muted">{{$review->updated_at->format('d/m/Y, H:i')}}</span> &ndash;
									<span class="fs-14 text-muted"><!-- stars -->
										@include($path.'partials/products/rating')
									</span>
								</h4>
								
								<p>
									{{$review->content}}
								</p>

							</div>
						</div>
						<!-- /REVIEW ITEM -->
					@endforeach

					
					@if($canWriteReview)
						<!-- REVIEW FORM -->
						<h4 class="page-header mb-40">{{trans('general.add-review')}}</h4>
						<form method="post" action="{{route('products.storeReview')}}" id="review-form">
							@csrf
							<div class="row mb-10">
								
								<div class="col-md-6 mb-10">
									<!-- Name -->
									<input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}" readonly="">
								</div>
								
								<div class="col-md-6">
									<!-- Email -->
									<input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}" readonly="">
								</div>
								
							</div>
							
							<!-- Comment -->
							<div class="mb-30">
								<textarea name="content" id="text" class="form-control" rows="6" placeholder="{{trans('general.content')}}" maxlength="1000">{{old('content')}}</textarea>
							</div>
							@if($errors->first('content'))
								<div class="alert alert-danger">
									{{$errors->first('content')}}
								</div>
							@endif

							<!-- Stars -->
							<div class="product-star-vote clearfix">

								@for($i=1; $i<=5;$i++)
									<label class="radio float-left">
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
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<!-- Send Button -->
							<button type="submit" id="submit-review-form" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('general.send-review')}}</button>
							
						</form>
						<!-- /REVIEW FORM -->
					@endif

				</div>
			</div>


			<hr class="mt-80 mb-80" />

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