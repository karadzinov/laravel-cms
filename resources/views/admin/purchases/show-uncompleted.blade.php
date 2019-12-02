@extends('admin/master')

@section('content')
	<div class="container">
		<div class="row widget-body">
			<!-- main start -->
			<!-- ================ -->
			<div class="main col-md-12">

				<!-- page-title start -->
				<!-- ================ -->
				<h1 class="page-title">{{trans('purchase.purchsase') .' #'.$purchase->id}}</h1>
				<div class="separator-2"></div>
				<!-- page-title end -->

				<div>
					@csrf
					@method('PUT')
					<table class="table cart">
						<thead>
							<tr>
								<th>{{trans('general.product')}}</th>
								<th>{{trans('general.price')}} </th>
								<th>{{trans('general.quantity')}}</th>
								<th class="amount">{{trans('general.total')}} </th>
							</tr>
						</thead>
						<tbody>
							@foreach($purchase->products as $product)
								<tr class="cart-item">
									<td class="product"><a href="{{$product->showRoute}}">{{$product->name}}</a> <small>{{$product->short_description}}</small></td>
									<td class="price">
										@if($product->completed)
											{{number_format($product->pivot->current_price, 2, '.', ' ').$settings->currencySymbol}}
										@else
											{{number_format($product->current_price, 2, '.', ' ').$settings->currencySymbol}}
										@endif
									</td>
									<td class="quantity">
										<div class="form-group">
											<input name="products[{{$product->id}}]" type="text" readonly="true" class="form-control" value="{{$product->pivot->quantity}}" readonly="">
										</div>											
									</td>
									<td class="amount"><span class="product-times-quantity">{{number_format($product->currentPrice*$product->pivot->quantity, 2, '.', ' ')}}</span>{{ $settings->currencySymbol }} </td>
								</tr>
							@endforeach
							<tr>
								<td class="total-quantity" colspan="3">
									{{trans('general.total')}} {{$purchase->products()->count()}} {{trans('general.items')}}
								</td>
								<td class="total-amount">
									{{$purchase->total . $settings->currencySymbol}}
								</td>
							</tr>
						</tbody>
					</table>
					<div class="space-bottom"></div>

					<fieldset>
						<legend>{{trans('general.billing-informations')}}</legend>
						<div class="form-horizontal" id="billing-information">
							<div class="row">
								<div class="col-lg-3">
									<h3 class="title">{{trans('general.personal-informations')}}</h3>
								</div>
								<div class="col-lg-8 col-lg-offset-1">
									<div class="form-group">
										<label for="billingFirstName" class="col-md-2 control-label">{{trans('general.first-name')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="text" readonly="true" name="first_name" class="form-control" id="billingFirstName" value="{{$purchase->first_name}}" disabled="">
										</div>
									</div>
									<div class="form-group">
										<label for="billingLastName" class="col-md-2 control-label">{{trans('general.last-name')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="text" readonly="true" name="last_name" class="form-control" id="billingLastName" value="{{$purchase->last_name}}" disabled="">
										</div>
									</div>
									<div class="form-group">
										<label for="billingTel" class="col-md-2 control-label">{{trans('general.phone')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="text" readonly="true" name="phone" class="form-control" id="billingTel" placeholder="+1234567891" value="{{$purchase->phone ?? null}}">
										</div>
									</div>
									<div class="form-group">
										<label for="billingemail" class="col-md-2 control-label">{{trans('general.email')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="email" name="email" class="form-control" id="billingemail" value="{{$purchase->email}}" disabled="">
										</div>
									</div>
								</div>
							</div>
							<div class="space"></div>
							<div class="row">
								<div class="col-lg-3">
									<h3 class="title">{{trans('general.address')}}</h3>
								</div>
								<div class="col-lg-8 col-lg-offset-1">
									<div class="form-group">
										<label for="billingAddress1" class="col-md-2 control-label">{{trans('general.home-address')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="text" readonly="true" name="home_address" class="form-control" id="billingAddress1" placeholder="{{trans('general.exemple-home-address')}}" value="{{$purchase->home_address ?? null}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">{{trans('general.country')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
										<input type="text" readonly="true" readonly="" value="{{$purchase->country}}" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="billingCity" class="col-md-2 control-label">{{trans('general.city')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="text" readonly="true" name="city" class="form-control" id="billingCity" placeholder="City" value="{{$purchase->city ?? null}}">
										</div>
									</div>
									<div class="form-group">
										<label for="billingPostalCode" name="zip" class="col-md-2 control-label">{{trans('general.zip')}}<small class="text-default">*</small></label>
										<div class="col-md-10">
											<input type="text" readonly="true" name="zip" class="form-control" id="billingPostalCode" placeholder="{{trans('general.zip')}}" value="{{$purchase->zip ?? null}}">
										</div>
									</div>
								</div>
							</div>
							<div class="space"></div>
						</div>
					</fieldset>
					@if($purchase->same_address)
						<fieldset>
							<legend>{{trans('general.shipping-informations')}}</legend>
							<div class="form-horizontal" id="shipping-information-container">
								<div id="shipping-information" class="space-bottom">
									<div class="row">
										<div class="col-lg-3">
											<h3 class="title">{{trans('general.personal-informations')}}</h3>
										</div>
										<div class="col-lg-8 col-lg-offset-1">
											<div class="form-group">
												<label for="shippingFirstName" class="col-md-2 control-label">{{trans('general.first-name')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" readonly="true" name="shipping_first_name" class="form-control" id="shippingFirstName" placeholder="{{trans('general.first-name')}}">
												</div>
											</div>
											<div class="form-group">
												<label for="shippingLastName" class="col-md-2 control-label">{{trans('general.last-name')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" readonly="true" name="shipping_last_name" class="form-control" id="shippingLastName" placeholder="{{trans('general.last-name')}}">
												</div>
											</div>
											<div class="form-group">
												<label for="shippingTel" class="col-md-2 control-label">{{trans('general.phone')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" readonly="true" name="shipping_phone" class="form-control" id="shippingTel" placeholder="+123456789">
												</div>
											</div>
											<div class="form-group">
												<label for="shippingemail" class="col-md-2 control-label">{{trans('general.email')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="email" name="shipping_email" class="form-control" id="shippingemail" placeholder="exemple@exemple.com">
												</div>
											</div>
										</div>
									</div>
									<div class="space"></div>
									<div class="row">
										<div class="col-lg-3">
											<h3 class="title">{{trans('general.shipping-address')}}</h3>
										</div>
										<div class="col-lg-8 col-lg-offset-1">
											<div class="form-group">
												<label for="shippingAddress1" class="col-md-2 control-label">{{trans('general.address')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" readonly="true" name="shipping_home_address" class="form-control" id="shippingAddress1" value="{{trans('general.exemple-home-address')}}">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">{{trans('general.country')}}<small class="text-default">*</small></label>
												<input type="text" readonly="true">
											</div>
											<div class="form-group">
												<label for="shippingCity" class="col-md-2 control-label">{{trans('general.city')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" readonly="true" name="shipping_city" class="form-control" id="shippingCity" placeholder="City">
												</div>
											</div>
											<div class="form-group">
												<label for="shippingPostalCode" class="col-md-2 control-label">{{trans('general.zip')}}<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" readonly="true" name="shipping_zip" class="form-control" id="shippingPostalCode" placeholder="{{trans('general.zip')}}">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="checkbox padding-top-clear">
									<label>
										<input name="same_address" type="checkbox" id="shipping-info-check" checked> My Shipping information is the same as my Billing information.
									</label>
								</div>
							</div>
						</fieldset>
					@endif
				</div>

			</div>
			<!-- main end -->
		</div>
	</div>
@endsection