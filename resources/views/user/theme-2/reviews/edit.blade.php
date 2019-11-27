@extends($path.'master')
@section('optionalHead')
	<style>
		.begining{
			margin-top: 97px;
		}
	</style>
@endsection
@section('content')
	
	<div class="container">
		<h3 class="begining">{{trans('general.edit-review-for')}} <a href="{{$review->product->showRoute}}">{{$review->product->name}}</a></h3>
		<form method="post" action="{{route('products.updateReview', $review->id)}}" id="review-form">
			@csrf
			@method('patch')
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
				<textarea name="content" id="text" class="form-control" rows="6" placeholder="{{trans('general.content')}}" maxlength="1000">{{$review->content}}</textarea>
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
						<input type="radio" name="rating" value="{{$i}}" @if($review->rating==$i) checked="true" @endif/>
						<i></i> {{$i}} <span class="fa fa-star"></span>
					</label>
				@endfor
			</div>
			@if($errors->first('rating'))
				<div class="alert alert-danger">
					{{$errors->first('rating')}}
				</div>
			@endif
			<!-- Send Button -->
			<button type="submit" id="submit-review-form" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('general.update')}}</button>
			
		</form>
	</div>
@endsection