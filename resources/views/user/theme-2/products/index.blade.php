@extends($path . 'master')
@section('optionalHead')
	<style>
		.start{
			margin-top: 100px;
		}
		.product-thumbnail{
			height: 540px;
			width: 100%;
			  object-fit: cover;

		}
		.top-form{
			margin:0;
			padding: 0 15px;
			text-align: center;
		}
		select{
			min-width: 150px;
		}
	</style>
@endsection
@section('content')

<!-- -->
<section>
	<div class="container start">
		<div class="row top-form text-center">
			<form class="form-inline" action="{{route('products.index')}}" method="GET">
				<div class="form-group-sm">
					<label>{{trans('general.sort-by')}}</label>
					<select name="sort_by" class="form-control">
						<option value="">{{trans('general.select')}}</option>
						<option value="created_at" @if(isset($request['sort_by']) && $request['sort_by']==='created_at') selected='selected' @endif>
							{{trans('general.date')}}
						</option>
						<option value="price" @if(isset($request['sort_by']) && $request['sort_by']==='price') selected='selected' @endif>
							{{trans('general.price')}}
						</option>
					</select>
				</div>
				<div class="form-group-sm">
					<label>{{trans('general.order')}}</label>
					<select name="order" class="form-control">
						<option value="">{{trans('general.select')}}</option>
						<option value="asc" @if(isset($request['order']) && $request['order']==='asc') selected='selected' @endif>
							{{trans('general.ascending')}}
						</option>
						<option value="desc" @if(isset($request['order']) && $request['order']==='desc') selected='selected' @endif>
							{{trans('general.descending')}}
						</option>
					</select> 
				</div>
				<div class="form-group-sm">
					<div class="row grid-space-10">
						<div >
							<label>{{trans('general.price')}} {{$currency}} ({{trans('general.min')}})</label>
							<input type="number" name="price_min" class="form-control" placeholder="0" @if(isset($request['price_min'])) value="{{intval($request['price_min'])}}"@endif>
						</div>
						<div >
							<label>{{trans('general.price')}} {{$currency}} ({{trans('general.max')}})</label>
							<input type="number" name="price_max" class="form-control col-xs-6" placeholder="&#8734" @if(isset($request['price_max'])) value="{{intval($request['price_max'])}}" @endif>
						</div>
					</div>
				</div>
				<div class="form-group-sm">
					<label>{{trans('general.category')}}</label>
					<select name="category" class="form-control">
						<option value="">{{trans('general.select')}}</option>
						@foreach($categories as $category)
							<option value="{{$category->id}}" @if(isset($request['category']) && $request['category']==$category->id) selected='selected' @endif>
								{{$category->name}}
							</option>
						@endforeach
					</select> 
				</div>
					<button type="submit" class="btn btn-default mt-20">{{trans('general.submit')}}</button>
			</form>
		</div>
		<!-- LIST OPTIONS -->
		<div class="clearfix shop-list-options mb-20">

			{{$products->links()}}

		</div>
		<!-- /LIST OPTIONS -->

		@if($products->isNotEmpty())
			<ul class="shop-item-list row list-inline m-0">

				@foreach($products as $product)
					<!-- ITEM -->
					<li class="col-lg-4 col-sm-4">

						<div class="shop-item">

							<div class="thumbnail">
								<!-- product image(s) -->
								<a class="shop-item-image" href="{{$product->showRoute}}">
									<img class="product-thumbnail" src="{{$product->medium}}" alt="{{$product->name}}" />
								</a>
								<!-- /product image(s) -->

								<!-- hover buttons -->
								<div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
									<a class="btn btn-light add-wishlist" href="#" data-item-id="3" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart p-0"></i></a>
								</div>
								<!-- /hover buttons -->
								
								<!-- countdown -->
								<div class="shop-item-counter">
									<div class="countdown" data-from="January 31, 2020 15:03:26" data-labels="years,months,weeks,days,hour,min,sec"><!-- Example Date From: December 31, 2018 15:03:26 --></div>
								</div>
								<!-- /countdown -->
							</div>
							
							<div class="shop-item-summary text-center">
								<h2>
									<a href="{{$product->showRoute}}">
										{{$product->name}}
									</a>
								</h2>
								<small>{{$product->short_description}}</small>
								
								<!-- rating -->
								<div class="shop-item-rating-line">
									<div class="rating rating-1 fs-13"><!-- rating-0 ... rating-5 --></div>
								</div>
								<!-- /rating -->

								<!-- price -->
								<!-- price -->
								<div class="shop-item-price">
									@if($product->reduction)
										<span class="line-through">{{$product->price.$currency}}</span>
									@endif
									{{$product->currentPrice.$currency}}
								</div>
								<!-- /price -->
							</div>

							<!-- buttons -->
							<div class="shop-item-buttons text-center">
								@if($cart->contains($product))
									<a href="{{route('cart.cart')}}" class="pull-right btn btn-light btn-animated">
										<i class="fa fa-lg fa-shopping-cart"></i>
										  &nbsp{{trans('general.already-in-cart')}}
									</a>
								@else
									<a href="javascript:void(0)" data-product="{{$product->id}}" class="pull-right btn btn-info add-to-cart">{{trans('general.add-to-cart')}}<i class="fa fa-cart-plus"></i></a>
								@endif
							</div>
							<!-- /buttons -->
						</div>

					</li>
					<!-- /ITEM -->
				@endforeach
			</ul>

			<hr />

			<!-- Pagination Default -->
			<div class="text-center">
				{{$products->links()}}
			</div>
			<!-- /Pagination Default -->
		@else
			<p>
				{{trans('general.no-results')}}
			</p>
		@endif
		
	</div>
</section>
<!-- / -->


@section('optionalScripts')
	<script>
		$(document).ready(function(){
			
			$('.add-to-cart').on('click', function(){
				const product_id = $(this).data('product');
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
				   		product_id
				   },
				   success:function(response){
				   	
				   	if(response.status === "already-added"){
				   		flashMessage("success", response.message);
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