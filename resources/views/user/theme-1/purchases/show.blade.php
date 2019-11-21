@extends($path.'master')

@section('content')
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{{$settings->title . ' ' . trans('general.products')}} </h1>
					<div class="separator-2"></div>
					<!-- page-title end -->

					<div id="invoice-container" class="invoice-container" id="invoice-container">
						<div class="row">
							<div class="col-sm-6">
								<img src="{{asset('images/settings/thumbnails/'.$settings->logo)}}" alt="logo">
								<p class="invoice-slogan">{{$settings->slogan}}</p>
								<address class="small">
									<strong>{{$settings->title}}</strong><br>
									{{$settings->address}}<br>
									<abbr title="Phone">P:</abbr> {{$settings->phone_number}}<br>
									{{trans('general.email')}}: <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
								</address>
							</div>
							<div class="col-sm-offset-3 col-sm-3">
								<p class="text-right small"><strong>{{trans('general.purchase')}} #{{$purchase->id}}</strong> <br> {{$purchase->updated_at->format('d M Y')}}</p>
								<h5 class="text-right">{{trans('general.client')}}</h5>
								<p class="text-right small">
									<strong>{{trans('general.name')}}:</strong> <span>{{$purchase->user->first_name . ' ' . $purchase->user->last_name}}</span> <br>
									<strong>{{trans('general.email')}}:</strong> <span>{{$purchase->user->email}}</span> <br>
									<strong>{{trans('general.address')}}:</strong> {{$purchase->home_address . ' ' . $purchase->zip . ' '. $purchase->city .  ' ' . $purchase->country}} <br>
									<strong>{{trans('general.phone')}}:</strong> {{$purchase->phone}} <br>
								</p>
								
								@if(in_array(1, $purchase->products->pluck('delivery')->toArray()))
									@if($purchase->shipping)
										<h5 class="text-right">{{trans('general.shipping-informations')}}</h5>
										<p class="text-right small">
											<strong>{{trans('general.name')}}:</strong> <span>{{$purchase->shipping->first_name . ' ' . $purchase->shipping->last_name}}</span> <br>
											<strong>{{trans('general.email')}}:</strong> <span>{{$purchase->shipping->email}}</span> <br>
											<strong>{{trans('general.address')}}:</strong> {{$purchase->shipping->home_address . ' ' . $purchase->shipping->zip . ' '. $purchase->shipping->city .  ' ' . $purchase->shipping->country}} <br>
											<strong>{{trans('general.phone')}}:</strong> {{$purchase->shipping->phone}} <br>
										</p>
									@else
										<small class="pull-right text-right">
											{{trans('general.same-shipping-address')}}
										</small>
									@endif
								@endif
							</div>
						</div>
						<p class="small margin-clear"><strong>{{trans('general.order-number')}}:</strong> {{$purchase->order_number}}</p>
						<p class="small margin-clear"><strong>{{trans('general.transaction-id')}}:</strong> {{$purchase->transaction_id}}</p>
						<table class="table cart table-bordered">
							<thead>
								<tr>
									<th>{{trans('general.description')}} </th>
									<th>{{trans('general.price')}} </th>
									<th>{{trans('general.quantity')}}</th>
									<th class="amount">{{trans('general.total')}} </th>
								</tr>
							</thead>
							<tbody>
								@foreach($purchase->products as $product)
									<tr>
										<td class="product">
											<a href="{{$product->showRoute}}">
												{{$product->name}}
											</a> 
											<small>{{$product->short_description}}</small>
										</td>
										<td class="price">{{number_format($product->pivot->current_price, 2, '.', ' '). ' ' . $purchase->currency}} </td>
										<td class="quantity">{{$product->pivot->quantity}} </td>
										<td class="amount">
											{{number_format($product->pivot->current_price * $product->pivot->quantity, 2, '.', ' ') .  ' ' . $purchase->currency}}
										</td>
									</tr>
								@endforeach
								<tr>
									<td class="total-quantity" colspan="3">{{trans('general.total')}}</td>
									<td class="total-amount">{{number_format($purchase->total, 2, '.', ' ')  . ' ' .  $purchase->currency}}</td>
								</tr>
							</tbody>
						</table>
						{!!trans('general.invoice-questions', ['name'=>$settings->title, 'phone'=>$settings->phone_number, 'email'=>$settings->email])!!}
						<hr>
					</div>
					<div class="text-right">	
						<button onclick="printInvoice();" class="btn btn-print btn-default-transparent btn-hvr hvr-shutter-out-horizontal">{{trans('general.print')}} <i class="fa fa-print pl-10"></i></button>
					</div>
				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
@endsection

@section('optionalScripts')
	<script>
		function printInvoice() {
		     var printContents = document.getElementById('invoice-container').innerHTML;
		     var originalContents = document.body.innerHTML;

		     document.body.innerHTML = printContents;

		     window.print();

		     document.body.innerHTML = originalContents;
		}
	</script>
@endsection