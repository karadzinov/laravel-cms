@extends($path . 'master')
@section('optionalHead')
	<style>
		.overlayContainerImages img{
		  height: 200px;
		}
	</style>
@endsection
@section('content')
	<div class="main-container">
		<div class="container">
			@if($pages->count())
				<div class="row">
					<div class="main col-md-12">
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title text-center">{{trans('general.pages')}}</h1>
							<div class="separator with-icon"><i class="fa fa-desktop bordered"></i></div>
							<p class="text-center">{{trans('general.pages_top_text')}}</p>
							<br>
							<br>
							<!-- page-title end -->
							<div class="masonry-grid row">
								@include($path . 'partials/pages/pages-list')
							</div>
					</div>
				</div>
			@else
				@include($path . 'partials/comingSoon')
			@endif
		</div>
	</div>
@endsection