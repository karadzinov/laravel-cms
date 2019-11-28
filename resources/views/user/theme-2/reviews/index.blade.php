@extends($path.'master')

@section('optionalHead')
	<style>
		.begining{
			margin-top:97px;
		}
		.inline{
			display: inline;
		}
	</style>
@endsection

@section('content')
	<div class="container begining">
		@if($user->reviews->isNotEmpty())
			<h3 class="mt-6">{{trans('general.my-reviews')}}</h3>
			<ul class="shop-item-list row list-inline m-0">
				@foreach($user->reviews as $review)
					<li class="col-lg-12">

						<div class="shop-item clearfix">

							<div class="thumbnail">
								<!-- product image(s) -->
								<a class="shop-item-image" href="{{$review->product->showRoute}}">
									<img class="img-fluid lazy" data-src="{{$review->product->medium}}" alt="product">
								</a>
								<!-- /product image(s) -->
							</div>
							
							<div class="shop-item-summary">
								<h2>{{$review->product->name}}</h2>
								
								<h5 class="mb-0 mt-30">{{trans('general.your-note')}}</h5>
								<!-- rating -->
								<div class="rating rating-{{$review->rating}} fs-13"><!-- rating-0 ... rating-5 --></div>
								<!-- /rating -->
								
								<h5 class="mb-0 mt-30">{{trans('general.your-comment')}}</h5>
								<p>{{$review->content}}</p>

								<!-- buttons -->
								<div class="shop-item-buttons">
									<a class="btn btn-light" href="{{route('products.editReview', $review->id)}}">		<i class="fa fa-edit"></i> {{trans('general.edit-review')}} </a>
									</a>
									<form class="inline" action="{{route('products.deleteReview', $review->id)}}" method="POST">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-danger">
											<i class="fa fa-warning"></i> {{trans('general.delete-review')}}
										</button>
									</form>

								</div>
								<!-- /buttons -->
							</div>

						</div>

					</li>
				@endforeach
			</ul>
		@else
			<p class="lead">{{trans('general.no-reviews')}}</p>
		@endif
	</div>
@endsection