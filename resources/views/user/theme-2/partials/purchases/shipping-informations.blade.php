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
							<input type="text" name="shipping_first_name" class="form-control" id="shippingFirstName" value="{{$purchase->shipping->first_name ?? old('shipping_first_name')}}" placeholder="{{trans('general.first-name')}}">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingLastName" class="col-md-2 control-label">{{trans('general.last-name')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_last_name" class="form-control" id="shippingLastName" value="{{$purchase->shipping->last_name ?? old('shipping_last_name')}}" placeholder="{{trans('general.last-name')}}">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingTel" class="col-md-2 control-label">{{trans('general.phone')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_phone" class="form-control" id="shippingTel" value="{{$purchase->shipping->phone ?? old('shipping_phone')}}" placeholder="+123456789">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingemail" class="col-md-2 control-label">{{trans('general.email')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="email" name="shipping_email" value="{{$purchase->shipping->email ?? old('shipping_email')}}" class="form-control" id="shippingemail" placeholder="exemple@exemple.com">
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
							<input type="text" name="shipping_home_address" class="form-control" id="shippingAddress1" value="{{$purchase->shipping->home_address ?? old('shipping_home_address')}}" placeholder="{{trans('general.exemple-home-address')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">{{trans('general.country')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							@include($path.'partials/purchases/select-country', ['fieldName'=>'shipping_country'])
						</div>
					</div>
					<div class="form-group">
						<label for="shippingCity" class="col-md-2 control-label">{{trans('general.city')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_city" class="form-control" value="{{$purchase->shipping->city ?? old('shipping_city')}}" id="shippingCity" placeholder="City">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingPostalCode" class="col-md-2 control-label">{{trans('general.zip')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_zip" class="form-control" value="{{$purchase->shipping->zip ?? old('shipping_zip')}}" id="shippingPostalCode" placeholder="{{trans('general.zip')}}">
						</div>
					</div>
				</div>
			</div>
		</div>
		<input name="same_shipping" type="checkbox" id="shipping-info-check"
			@if(isset($purchase) && $purchase->shipping)
				null
			@else
				checked="true" 
			@endif
		> {{trans('general.same-shipping')}}</input>
	</div>
</fieldset>

@section('optionalScripts')
	<script>
		if($('#shipping-info-check').val()){
			$('#shipping-information').toggle();
		}
		$('#shipping-info-check').on('change', function(){
			$('#shipping-information').toggle('toggle');

		})
	</script>
@endsection