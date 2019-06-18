@extends('layouts/master')
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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ut quisquam ab harum hic enim quibusdam aut quasi recusandae temporibus quo voluptatibus, dolorem consectetur ipsam facere ipsa. Commodi sunt, inventore!</p>
					@if(!count($posts) && !count($pages) && !count($faqs))
						<p class="lead">No results for "{{$search}}"</p>
					@else
						<!-- Nav tabs -->
						<ul class="nav nav-tabs style-1" role="tablist">
							@if(count($posts))
								<li><a href="#tab1" role="tab" data-toggle="tab"><i class="fa  fa-pencil pr-10"></i>Posts</a></li>
							@endif
							@if(count($pages))
								<li><a href="#tab2" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o"></i> Pages</a></li>
							@endif
							@if(count($faqs))
								<li><a href="#tab3" role="tab" data-toggle="tab"><i class="fa fa-question pr-10"></i>Faqs</a></li>
							@endif
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							@if(count($posts))
								<div class="tab-pane fade" id="tab1">
									@include('partials/user/posts/posts-list')
								</div>
							@endif
							@if(count($pages))
								<div class="tab-pane fade" id="tab2">
									@include('partials/user/pages/pages-list')
								</div>
							@endif
							@if(count($faqs))
								<div class="tab-pane fade" id="tab3">
									<!-- accordion start -->
									<div class="panel-group collapse-style-1" id="accordion-faq-3">
										@foreach($faqs as $faq)
											@include('partials/user/faqs/item')
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