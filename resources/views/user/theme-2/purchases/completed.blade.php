@extends($path.'master')
@section('optionalHead')
	<style>
		section{
			min-height: 100vh;
		}
	</style>
@endsection
@section('content')
	<!-- -->
	<section>
		<div class="container">
			
			<!-- CHECKOUT FINAL MESSAGE -->
			<div class="card card-default">
				<div class="card-block">
					<h3>{{trans('general.thank-you')}}!</h3>

					<p>
						{!!trans('general.successfull-purchase', ['route'=>route('purchases.index')])!!}
					</p>

					<hr />

					<p class="text-center">
						<a href="{{route('products.index')}}" class="btn btn-success btn-lg">{{trans('general.continue-shopping')}}!</a>	
					</p>
				</div>
			</div>
			<!-- /CHECKOUT FINAL MESSAGE -->
			
		</div>
	</section>
@endsection