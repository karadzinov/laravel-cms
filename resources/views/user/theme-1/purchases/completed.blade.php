@extends($path.'master')
@section('optionalHead')
	<style>
		.main-container{
			height: 90vh;
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
				<div class="main col-md-8 col-md-offset-2">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title text-center">{{trans('general.thank-you')}}! <i class="fa fa-smile-o pl-10"></i></h1>
					<div class="separator"></div>
					<!-- page-title end -->
					<p class="lead text-center">{!!trans('general.successfull-purchase', ['route'=>route('purchases.myPurchases')])!!}</p>
					<p class="text-center">
						<a href="{{route('products')}}" class="btn btn-default btn-lg">{{trans('general.continue-shopping')}}!</a>	
					</p>

				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection