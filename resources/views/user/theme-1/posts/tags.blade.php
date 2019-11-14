@extends($path . 'master')
@section('optionalHead')
	<style>
		.overlay-container{
			height: 200px;
		}
		
		.products-wrapper{
			position: relative;
		}
	</style>
@endsection
@section('content')
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="main col-md-12">
				<!-- page-title start -->
				<!-- ================ -->
				<h1 class="page-title text-center">#{{$tag->name}}</h1>
				<div class="separator with-icon"><i class="fa fa-hashtag bordered"></i></div>
				<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				<br>
				<br>
				<!-- page-title end -->
				<div class="masonry-grid row">
					<ul class="nav nav-tabs style-1" role="tablist">
						<li class="@if($activeTab === 'products') active @endif"><a href="#htab1" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes pr-10"></i>{{trans('general.products')}}</a></li>
						<li class="@if($activeTab === 'posts') active @endif"><a href="#htab2" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil pr-10"></i>{{trans('general.posts')}}</a></li>
					</ul>
					<div class="tab-content clear-style">
						<div class="tab-pane fade @if($activeTab === 'products') active in @endif products-wrapper" id="htab1">
							@foreach($tag->products as $product) 
								@if($product->reduction)
									@include($path . 'partials/products/with-reduction')
								@else
									@include($path . 'partials/products/without-reduction')
								@endif
							@endforeach
						</div>
						<div class="tab-pane fade @if($activeTab === 'posts') active in @endif" id="htab2">
							@include($path . 'partials/posts/posts-list', ['posts'=>$tag->posts])
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection