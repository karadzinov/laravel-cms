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
@if(isset($product) && $product->delivery)
	
	@include($path.'partials/purchases/shipping-informations')

@elseif(isset($cart) && $cart->products->where('delivery', '=', 1)->first()->isNotEmpty())
	
	@include($path.'partials/purchases/shipping-informations')

@endif
{{-- <fieldset>
	<legend>Payment</legend>
	<form role="form" class="form-horizontal" id="payment-information">
		<div class="row">
			<div class="col-lg-3">
				<div class="radio">
					<span>
						<i class="fa fa-credit-card"></i> Credit Card
					</span>
				</div>
				<div class="space-bottom"></div>
			</div>
			<div class="col-lg-9">
				<div class="form-group">
					<label class="col-md-3 control-label">Card Number<small class="text-default">*</small></label>
					<div class="col-md-9">
						<div class="row">
							<div class="col-xs-6 col-sm-2">
								<input type="text" class="form-control">
							</div>
							<div class="col-xs-6 col-sm-2">
								<input type="text" class="form-control">
							</div>
							<div class="clearfix space-bottom visible-xs"></div>
							<div class="col-xs-6 col-sm-2">
								<input type="text" class="form-control">
							</div>
							<div class="col-xs-6 col-sm-2">
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Expiration Date<small class="text-default">*</small></label>
					<div class="col-md-9">
						<div class="row">
							<div class="col-xs-6 col-sm-2">
								<select class="form-control">
									<option value="01" selected="selected">01</option>
									<option value="03">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
							<div class="col-xs-6 col-sm-2">
								<select class="form-control">
									<option value="2014" selected="selected">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">CVS<small class="text-default">*</small></label>
					<div class="col-md-9">
						<div class="row">
							<div class="col-xs-6 col-sm-2">
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</fieldset> --}}