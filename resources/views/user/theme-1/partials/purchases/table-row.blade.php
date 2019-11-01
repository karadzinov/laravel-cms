<tr>
	<td>{{$purchase->id}}</td>
	<td>{{$purchase->created_at->format('d M Y, H:i')}}</td>
	<td>{{$purchase->updated_at->format('d M Y, H:i')}}</td>
	<td>{{$purchase->products()->count()}}</td>
	<td>
		@if($purchase->completed)
			<span class="label label-success">{{trans('general.completed')}}</span>
		@else
			<span class="label label-warning">{{trans('general.uncompleted')}}</span>
		@endif
	</td>
	<td>{{ number_format($purchase->total, 1, '', ' ') }}</td>
	<td>{{$purchase->currency}}</td>
	<td>{{$purchase->home_address . ' ' . $purchase->zip .' ' . $purchase->city . ' ' . $purchase->country}}</td>
	<td>{{$purchase->order_number}}</td>
	<td>{{$purchase->transaction_id}}</td>
	<td>{{$purchase->status}}</td>
	<td>
		<a href="{{$purchase->showRoute}}" class="btn btn-info">{{trans('general.show')}}</a>
	</td>
</tr>