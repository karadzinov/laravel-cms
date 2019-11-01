@extends($path.'master')
@section('optionalHead')
	<style>
		.main-container{
			margin-top: 20px;
			margin-bottom: 20px;
			height: 90vh;
		}
	</style>
@endsection
@section('content')
	<div class="container main-container">
		<div class="row">
			<diV class="col-md-12">
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
			</diV>
		</div>
	</div>
@endsection