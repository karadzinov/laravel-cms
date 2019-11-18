@extends($path.'master')
@section('optionalHead')
	<style>
		.overlay-container{
			height: 200px;
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
				<div class="main col-md-10">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">Search results for "{{$search}}"</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->
					@if(!count($posts) && !count($products) && !count($pages) && !count($faqs))
						<p class="lead">{{trans('general.no-results-for')}} "{{$search}}"</p>
					@else
						<!-- Nav tabs -->
						<ul class="nav nav-tabs style-1" role="tablist">
							@if(count($products))
								<li><a href="#tab0" role="tab" data-toggle="tab"><i class="fa  fa-cubes pr-10"></i>{{trans('general.navigation.products')}}</a></li>
							@endif
							@if(count($posts))
								<li><a href="#tab1" role="tab" data-toggle="tab"><i class="fa  fa-pencil pr-10"></i>{{trans('general.navigation.posts')}}</a></li>
							@endif
							@if(count($pages))
								<li><a href="#tab2" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o"></i> {{trans('general.navigation.pages')}}</a></li>
							@endif
							@if(count($faqs))
								<li><a href="#tab3" role="tab" data-toggle="tab"><i class="fa fa-question pr-10"></i>{{trans('general.navigation.faq')}}</a></li>
							@endif
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							@if(count($products))
								<div class="tab-pane fade" id="tab0">
									@foreach($products as $product) 
										@if($product->reduction)
											@include($path . 'partials/products/with-reduction')
										@else
											@include($path . 'partials/products/without-reduction')
										@endif
									@endforeach
								</div>
							@endif
							@if(count($posts))
								<div class="tab-pane fade" id="tab1">
									@include($path . 'partials/posts/posts-list')
								</div>
							@endif
							@if(count($pages))
								<div class="tab-pane fade" id="tab2">
									@include($path . 'partials/pages/pages-list')
								</div>
							@endif
							@if(count($faqs))
								<div class="tab-pane fade" id="tab3">
									<!-- accordion start -->
									<div class="panel-group collapse-style-1" id="accordion-faq-3">
										@foreach($faqs as $faq)
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion-faq" href="#{{$faq->id}}" class="collapsed">
															<i class="fa fa-question-circle pr-10"></i> 
															{{$faq->question}}
														</a>
													</h4>
												</div>
												<div id="{{$faq->id}}" class="panel-collapse collapse">
													<div class="panel-body">
														{{$faq->answer}}
													</div>
												</div>
											</div>
										@endforeach
									</div>
									<!-- accordion end -->
								</div>
							@endif
						</div>
					@endif
				</div>
				<!-- main end -->
			</div>
		</div>
	</section>

@endsection

@section('optionalScripts')
	<script>
		$('.tab-content div:first-child').addClass('in active');
		$('.nav-tabs li:first-child').addClass('active');
	</script>
@endsection