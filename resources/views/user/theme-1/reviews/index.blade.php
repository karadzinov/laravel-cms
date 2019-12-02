@extends($path.'master')
@section('optionalHead')
	<style>
		.inline{
			display: inline;
		}
	</style>
@endsection
@section('content')
	<div class="container mt-50">
		<h3 class="mt-6">{{trans('general.my-reviews')}}</h3>
		@foreach($user->reviews as $review)
			<div class="listing-item">
				<div class="row grid-space-0">
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="overlay-container">
							<img data-src="{{$review->product->medium}}" class="lazy" alt="">
						</div>
					</div>
					<div class="col-sm-6 col-md-8 col-lg-9">
						<div class="body">
							<h3 class="margin-clear">
								<a href="{{$review->product->showRoute}}">{{$review->product->name}}</a>
							</h3>
							<label for="rating">{{trans('general.your-note')}}</label>
							<p>
								@include($path.'partials/products/rating', ['count'=>$review->rating])
							</p>
							<p>{{$review->content}}</p>
							<div class="elements-list clearfix">
								<a class="btn btn-default-transparent btn-animated" href="{{route('products.editReview', $review->id)}}">	<i class="fa fa-edit"></i> {{trans('general.edit-review')}} </a>
								</a>
								<form class="inline" action="{{route('products.deleteReview', $review->id)}}" method="POST">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger">
										<i class="fa fa-warning"></i> {{trans('general.delete-review')}}
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection