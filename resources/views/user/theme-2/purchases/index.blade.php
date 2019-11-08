@extends($path.'master')
@section('optionalHead')
	<style>
		body.grain-grey, body.grain-grey #wrapper, body.grain-grey #topBar, body.grain-grey #header.fixed, body.grain-grey #header li.search .search-box, body.grain-grey #header li.quick-cart .quick-cart-box, body.grain-grey div.heading-title h1, body.grain-grey div.heading-title h2, body.grain-grey div.heading-title h3, body.grain-grey div.heading-title h4, body.grain-grey div.heading-title h5, body.grain-grey div.heading-title h6{
			background-color: white;
		}
		
		.main-container{
			margin-top: 100px;
			margin-bottom: 20px;
			min-height: 90vh;
			bag
		}
	</style>
@endsection
@section('content')
	<div class="container main-container">
		<div class="row">
			<diV class="col-md-12">
				@if($user->purchases->isNotEmpty())
					<table class="table table-hover table-colored table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>{{trans('general.created-at')}}</th>
								<th>{{trans('general.updated-at')}}</th>
								<th>{{trans('general.items')}}</th>
								<th>{{trans('general.completed')}}</th>
								<th>{{trans('general.total')}}</th>
								<th>{{trans('general.currency')}}</th>
								<th>{{trans('general.address')}}</th>
								<th>{{trans('general.order-number')}}</th>
								<th>{{trans('general.transaction-id')}}</th>
								<th>{{trans('general.status')}}</th>
								<th>{{trans('general.actions')}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($user->purchases as $purchase)
								@include($path.'partials/purchases/table-row')
							@endforeach
						</tbody>
					</table>
				@else
					<p>
						No results
					</p>
				@endif
			</diV>
		</div>
	</div>
@endsection