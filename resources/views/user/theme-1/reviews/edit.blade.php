@extends($path.'master')
@section('optionalHead')
	<style>
		
	</style>
@endsection
@section('content')
	<div class="container">
		<form method="post" action="{{route('products.updateReview', $review->id)}}" id="review-form">
			@csrf
			@method('patch')
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
			</div>
			<div class="form-group has-feedback">
				<label for="content">{{trans('general.message')}}</label>
				<textarea name="content" id="text" class="form-control" rows="6" placeholder="{{trans('general.content')}}" maxlength="1000">{{$review->content}}</textarea>
				<i class="fa fa-envelope-o form-control-feedback"></i>
			</div>
			@if($errors->first('content'))
				<div class="alert alert-danger">
					{{$errors->first('content')}}
				</div>
			@endif

			<button type="submit" id="submit-review-form" class="btn btn-default"><i class="fa fa-check"></i> {{trans('general.send-review')}}</button>
		</form>
	</div>
@endsection