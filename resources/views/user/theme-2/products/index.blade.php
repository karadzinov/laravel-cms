@extends($path . 'master')
@section('optionalHead')
	<style>
		.start{
			margin-top: 97px;
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
			padding: 6px 12px;
		}
	</style>
@endsection
@section('content')

@if($products->isNotEmpty())
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
						<button type="submit" class="btn btn-lg btn-default mt-20">{{trans('general.submit')}}</button>
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
						@include($path.'/partials/products/list-item')
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
@else
	@include($path . 'comingSoon')
@endif