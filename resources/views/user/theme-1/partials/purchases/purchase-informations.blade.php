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
						<input type="text" name="first_name" class="form-control" id="billingFirstName" value="{{$purchase->user->first_name ?? auth()->user()->first_name}}" disabled="">
					</div>
				</div>
				<div class="form-group">
					<label for="billingLastName" class="col-md-2 control-label">{{trans('general.last-name')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="text" name="last_name" class="form-control" id="billingLastName" value="{{auth()->user()->last_name}}" disabled="">
					</div>
				</div>
				<div class="form-group">
					<label for="billingTel" class="col-md-2 control-label">{{trans('general.phone')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="text" name="phone" class="form-control" id="billingTel" placeholder="+1234567891" value="{{$purchase->phone ?? old('phone')}}">
					</div>
				</div>
				<div class="form-group">
					<label for="billingemail" class="col-md-2 control-label">{{trans('general.email')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="email" name="email" class="form-control" id="billingemail" value="{{auth()->user()->email}}" disabled="">
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
						<input type="text" name="home_address" class="form-control" id="billingAddress1" placeholder="{{trans('general.exemple-home-address')}}" value="{{$purchase->home_address ?? old('home_address')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">{{trans('general.country')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						@include($path.'partials/purchases/select-country', ['fieldName' => 'country'])
					</div>
				</div>
				<div class="form-group">
					<label for="billingCity" class="col-md-2 control-label">{{trans('general.city')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="text" name="city" class="form-control" id="billingCity" placeholder="City" value="{{$purchase->city ?? old('city')}}">
					</div>
				</div>
				<div class="form-group">
					<label for="billingPostalCode" name="zip" class="col-md-2 control-label">{{trans('general.zip')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="text" name="zip" class="form-control" id="billingPostalCode" placeholder="{{trans('general.zip')}}" value="{{$purchase->zip ?? old('zip')}}">
					</div>
				</div>
			</div>
		</div>
		<div class="space"></div>
	</div>
</fieldset>
@if(isset($cart))
	@if(!$cart->where('delivery', '=', 1)->first())
		<input type="hidden" name="same_shipping" value="true">
	@else
		@include($path.'partials/purchases/shipping-informations')
	@endif
@elseif(isset($purchase))
	@if(!$purchase->products->where('delivery', '=', 1)->first())
		<input type="hidden" name="same_shipping" value="true">
	@else
		@include($path.'partials/purchases/shipping-informations')
	@endif
@elseif(isset($product))
	@if(!$product->delivery)
		<input type="hidden" name="same_shipping" value="true">
	@else
		@include($path.'partials/purchases/shipping-informations')
	@endif
@else
	@include($path.'partials/purchases/shipping-informations')
@endif