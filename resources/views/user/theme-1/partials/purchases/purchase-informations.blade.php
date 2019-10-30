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
						<input type="text" name="first_name" class="form-control" id="billingFirstName" value="{{auth()->user()->first_name}}" disabled="">
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
						<input type="text" name="phone" class="form-control" id="billingTel" placeholder="+1234567891">
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
						<input type="text" name="home_address" class="form-control" id="billingAddress1" placeholder="{{trans('general.exemple-home-address')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">{{trans('general.country')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<select class="form-control" name="country">
							<option value="AF">Afghanistan</option>
							<option value="AX">Aland Islands</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AS">American Samoa</option>
							<option value="AD">Andorra</option>
							<option value="AO">Angola</option>
							<option value="AI">Anguilla</option>
							<option value="AQ">Antarctica</option>
							<option value="AG">Antigua and Barbuda</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>
							<option value="BB">Barbados</option>
							<option value="BY">Belarus</option>
							<option value="BE">Belgium</option>
							<option value="BZ">Belize</option>
							<option value="BJ">Benin</option>
							<option value="BM">Bermuda</option>
							<option value="BT">Bhutan</option>
							<option value="BO">Bolivia</option>
							<option value="BA">Bosnia and Herzegovina</option>
							<option value="BW">Botswana</option>
							<option value="BV">Bouvet Island</option>
							<option value="BR">Brazil</option>
							<option value="IO">British Indian Ocean Territory</option>
							<option value="VG">British Virgin Islands</option>
							<option value="BN">Brunei</option>
							<option value="BG">Bulgaria</option>
							<option value="BF">Burkina Faso</option>
							<option value="BI">Burundi</option>
							<option value="KH">Cambodia</option>
							<option value="CM">Cameroon</option>
							<option value="CA">Canada</option>
							<option value="CV">Cape Verde</option>
							<option value="BQ">Caribbean Netherlands</option>
							<option value="KY">Cayman Islands</option>
							<option value="CF">Central African Republic</option>
							<option value="TD">Chad</option>
							<option value="CL">Chile</option>
							<option value="CN">China</option>
							<option value="CX">Christmas Island</option>
							<option value="CC">Cocos (Keeling) Islands</option>
							<option value="CO">Colombia</option>
							<option value="KM">Comoros</option>
							<option value="CG">Congo (Brazzaville)</option>
							<option value="CD">Congo (Kinshasa)</option>
							<option value="CK">Cook Islands</option>
							<option value="CR">Costa Rica</option>
							<option value="HR">Croatia</option>
							<option value="CU">Cuba</option>
							<option value="CW">Curaçao</option>
							<option value="CY">Cyprus</option>
							<option value="CZ">Czech Republic</option>
							<option value="DK">Denmark</option>
							<option value="DJ">Djibouti</option>
							<option value="DM">Dominica</option>
							<option value="DO">Dominican Republic</option>
							<option value="EC">Ecuador</option>
							<option value="EG">Egypt</option>
							<option value="SV">El Salvador</option>
							<option value="GQ">Equatorial Guinea</option>
							<option value="ER">Eritrea</option>
							<option value="EE">Estonia</option>
							<option value="ET">Ethiopia</option>
							<option value="FK">Falkland Islands</option>
							<option value="FO">Faroe Islands</option>
							<option value="FJ">Fiji</option>
							<option value="FI">Finland</option>
							<option value="FR">France</option>
							<option value="GF">French Guiana</option>
							<option value="PF">French Polynesia</option>
							<option value="TF">French Southern Territories</option>
							<option value="GA">Gabon</option>
							<option value="GM">Gambia</option>
							<option value="GE">Georgia</option>
							<option value="DE">Germany</option>
							<option value="GH">Ghana</option>
							<option value="GI">Gibraltar</option>
							<option value="GR">Greece</option>
							<option value="GL">Greenland</option>
							<option value="GD">Grenada</option>
							<option value="GP">Guadeloupe</option>
							<option value="GU">Guam</option>
							<option value="GT">Guatemala</option>
							<option value="GG">Guernsey</option>
							<option value="GN">Guinea</option>
							<option value="GW">Guinea-Bissau</option>
							<option value="GY">Guyana</option>
							<option value="HT">Haiti</option>
							<option value="HM">Heard Island and McDonald Islands</option>
							<option value="HN">Honduras</option>
							<option value="HK">Hong Kong S.A.R., China</option>
							<option value="HU">Hungary</option>
							<option value="IS">Iceland</option>
							<option value="IN">India</option>
							<option value="ID">Indonesia</option>
							<option value="IR">Iran</option>
							<option value="IQ">Iraq</option>
							<option value="IE">Ireland</option>
							<option value="IM">Isle of Man</option>
							<option value="IL">Israel</option>
							<option value="IT">Italy</option>
							<option value="CI">Ivory Coast</option>
							<option value="JM">Jamaica</option>
							<option value="JP">Japan</option>
							<option value="JE">Jersey</option>
							<option value="JO">Jordan</option>
							<option value="KZ">Kazakhstan</option>
							<option value="KE">Kenya</option>
							<option value="KI">Kiribati</option>
							<option value="KW">Kuwait</option>
							<option value="KG">Kyrgyzstan</option>
							<option value="LA">Laos</option>
							<option value="LV">Latvia</option>
							<option value="LB">Lebanon</option>
							<option value="LS">Lesotho</option>
							<option value="LR">Liberia</option>
							<option value="LY">Libya</option>
							<option value="LI">Liechtenstein</option>
							<option value="LT">Lithuania</option>
							<option value="LU">Luxembourg</option>
							<option value="MO">Macao S.A.R., China</option>
							<option value="MK">Macedonia</option>
							<option value="MG">Madagascar</option>
							<option value="MW">Malawi</option>
							<option value="MY">Malaysia</option>
							<option value="MV">Maldives</option>
							<option value="ML">Mali</option>
							<option value="MT">Malta</option>
							<option value="MH">Marshall Islands</option>
							<option value="MQ">Martinique</option>
							<option value="MR">Mauritania</option>
							<option value="MU">Mauritius</option>
							<option value="YT">Mayotte</option>
							<option value="MX">Mexico</option>
							<option value="FM">Micronesia</option>
							<option value="MD">Moldova</option>
							<option value="MC">Monaco</option>
							<option value="MN">Mongolia</option>
							<option value="ME">Montenegro</option>
							<option value="MS">Montserrat</option>
							<option value="MA">Morocco</option>
							<option value="MZ">Mozambique</option>
							<option value="MM">Myanmar</option>
							<option value="NA">Namibia</option>
							<option value="NR">Nauru</option>
							<option value="NP">Nepal</option>
							<option value="NL">Netherlands</option>
							<option value="AN">Netherlands Antilles</option>
							<option value="NC">New Caledonia</option>
							<option value="NZ">New Zealand</option>
							<option value="NI">Nicaragua</option>
							<option value="NE">Niger</option>
							<option value="NG">Nigeria</option>
							<option value="NU">Niue</option>
							<option value="NF">Norfolk Island</option>
							<option value="MP">Northern Mariana Islands</option>
							<option value="KP">North Korea</option>
							<option value="NO">Norway</option>
							<option value="OM">Oman</option>
							<option value="PK">Pakistan</option>
							<option value="PW">Palau</option>
							<option value="PS">Palestinian Territory</option>
							<option value="PA">Panama</option>
							<option value="PG">Papua New Guinea</option>
							<option value="PY">Paraguay</option>
							<option value="PE">Peru</option>
							<option value="PH">Philippines</option>
							<option value="PN">Pitcairn</option>
							<option value="PL">Poland</option>
							<option value="PT">Portugal</option>
							<option value="PR">Puerto Rico</option>
							<option value="QA">Qatar</option>
							<option value="RE">Reunion</option>
							<option value="RO">Romania</option>
							<option value="RU">Russia</option>
							<option value="RW">Rwanda</option>
							<option value="BL">Saint Barthélemy</option>
							<option value="SH">Saint Helena</option>
							<option value="KN">Saint Kitts and Nevis</option>
							<option value="LC">Saint Lucia</option>
							<option value="MF">Saint Martin (French part)</option>
							<option value="PM">Saint Pierre and Miquelon</option>
							<option value="VC">Saint Vincent and the Grenadines</option>
							<option value="WS">Samoa</option>
							<option value="SM">San Marino</option>
							<option value="ST">Sao Tome and Principe</option>
							<option value="SA">Saudi Arabia</option>
							<option value="SN">Senegal</option>
							<option value="RS">Serbia</option>
							<option value="SC">Seychelles</option>
							<option value="SL">Sierra Leone</option>
							<option value="SG">Singapore</option>
							<option value="SX">Sint Maarten</option>
							<option value="SK">Slovakia</option>
							<option value="SI">Slovenia</option>
							<option value="SB">Solomon Islands</option>
							<option value="SO">Somalia</option>
							<option value="ZA">South Africa</option>
							<option value="GS">South Georgia and the South Sandwich Islands</option>
							<option value="KR">South Korea</option>
							<option value="SS">South Sudan</option>
							<option value="ES">Spain</option>
							<option value="LK">Sri Lanka</option>
							<option value="SD">Sudan</option>
							<option value="SR">Suriname</option>
							<option value="SJ">Svalbard and Jan Mayen</option>
							<option value="SZ">Swaziland</option>
							<option value="SE">Sweden</option>
							<option value="CH">Switzerland</option>
							<option value="SY">Syria</option>
							<option value="TW">Taiwan</option>
							<option value="TJ">Tajikistan</option>
							<option value="TZ">Tanzania</option>
							<option value="TH">Thailand</option>
							<option value="TL">Timor-Leste</option>
							<option value="TG">Togo</option>
							<option value="TK">Tokelau</option>
							<option value="TO">Tonga</option>
							<option value="TT">Trinidad and Tobago</option>
							<option value="TN">Tunisia</option>
							<option value="TR">Turkey</option>
							<option value="TM">Turkmenistan</option>
							<option value="TC">Turks and Caicos Islands</option>
							<option value="TV">Tuvalu</option>
							<option value="VI">U.S. Virgin Islands</option>
							<option value="UG">Uganda</option>
							<option value="UA">Ukraine</option>
							<option value="AE">United Arab Emirates</option>
							<option value="GB">United Kingdom</option>
							<option value="US" selected="selected">United States</option>
							<option value="UM">United States Minor Outlying Islands</option>
							<option value="UY">Uruguay</option>
							<option value="UZ">Uzbekistan</option>
							<option value="VU">Vanuatu</option>
							<option value="VA">Vatican</option>
							<option value="VE">Venezuela</option>
							<option value="VN">Vietnam</option>
							<option value="WF">Wallis and Futuna</option>
							<option value="EH">Western Sahara</option>
							<option value="YE">Yemen</option>
							<option value="ZM">Zambia</option>
							<option value="ZW">Zimbabwe</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="billingCity" class="col-md-2 control-label">{{trans('general.city')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="text" name="city" class="form-control" id="billingCity" placeholder="City">
					</div>
				</div>
				<div class="form-group">
					<label for="billingPostalCode" name="zip" class="col-md-2 control-label">{{trans('general.zip')}}<small class="text-default">*</small></label>
					<div class="col-md-10">
						<input type="text" name="zip" class="form-control" id="billingPostalCode" placeholder="{{trans('general.zip')}}">
					</div>
				</div>
			</div>
		</div>
		<div class="space"></div>
	</div>
</fieldset>
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
							<input type="text" name="shipping_first_name" class="form-control" id="shippingFirstName" placeholder="{{trans('general.first-name')}}">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingLastName" class="col-md-2 control-label">{{trans('general.last-name')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_last_name" class="form-control" id="shippingLastName" placeholder="{{trans('general.last-name')}}">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingTel" class="col-md-2 control-label">{{trans('general.phone')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_phone" class="form-control" id="shippingTel" placeholder="+123456789">
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
							<input type="text" name="shipping_home_address" class="form-control" id="shippingAddress1" value="{{trans('general.exemple-home-address')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">{{trans('general.country')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<select class="form-control" name="shipping_country">
								<option value="AF">Afghanistan</option>
								<option value="AX">Aland Islands</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AS">American Samoa</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
								<option value="BY">Belarus</option>
								<option value="BE">Belgium</option>
								<option value="BZ">Belize</option>
								<option value="BJ">Benin</option>
								<option value="BM">Bermuda</option>
								<option value="BT">Bhutan</option>
								<option value="BO">Bolivia</option>
								<option value="BA">Bosnia and Herzegovina</option>
								<option value="BW">Botswana</option>
								<option value="BV">Bouvet Island</option>
								<option value="BR">Brazil</option>
								<option value="IO">British Indian Ocean Territory</option>
								<option value="VG">British Virgin Islands</option>
								<option value="BN">Brunei</option>
								<option value="BG">Bulgaria</option>
								<option value="BF">Burkina Faso</option>
								<option value="BI">Burundi</option>
								<option value="KH">Cambodia</option>
								<option value="CM">Cameroon</option>
								<option value="CA">Canada</option>
								<option value="CV">Cape Verde</option>
								<option value="BQ">Caribbean Netherlands</option>
								<option value="KY">Cayman Islands</option>
								<option value="CF">Central African Republic</option>
								<option value="TD">Chad</option>
								<option value="CL">Chile</option>
								<option value="CN">China</option>
								<option value="CX">Christmas Island</option>
								<option value="CC">Cocos (Keeling) Islands</option>
								<option value="CO">Colombia</option>
								<option value="KM">Comoros</option>
								<option value="CG">Congo (Brazzaville)</option>
								<option value="CD">Congo (Kinshasa)</option>
								<option value="CK">Cook Islands</option>
								<option value="CR">Costa Rica</option>
								<option value="HR">Croatia</option>
								<option value="CU">Cuba</option>
								<option value="CW">Curaçao</option>
								<option value="CY">Cyprus</option>
								<option value="CZ">Czech Republic</option>
								<option value="DK">Denmark</option>
								<option value="DJ">Djibouti</option>
								<option value="DM">Dominica</option>
								<option value="DO">Dominican Republic</option>
								<option value="EC">Ecuador</option>
								<option value="EG">Egypt</option>
								<option value="SV">El Salvador</option>
								<option value="GQ">Equatorial Guinea</option>
								<option value="ER">Eritrea</option>
								<option value="EE">Estonia</option>
								<option value="ET">Ethiopia</option>
								<option value="FK">Falkland Islands</option>
								<option value="FO">Faroe Islands</option>
								<option value="FJ">Fiji</option>
								<option value="FI">Finland</option>
								<option value="FR">France</option>
								<option value="GF">French Guiana</option>
								<option value="PF">French Polynesia</option>
								<option value="TF">French Southern Territories</option>
								<option value="GA">Gabon</option>
								<option value="GM">Gambia</option>
								<option value="GE">Georgia</option>
								<option value="DE">Germany</option>
								<option value="GH">Ghana</option>
								<option value="GI">Gibraltar</option>
								<option value="GR">Greece</option>
								<option value="GL">Greenland</option>
								<option value="GD">Grenada</option>
								<option value="GP">Guadeloupe</option>
								<option value="GU">Guam</option>
								<option value="GT">Guatemala</option>
								<option value="GG">Guernsey</option>
								<option value="GN">Guinea</option>
								<option value="GW">Guinea-Bissau</option>
								<option value="GY">Guyana</option>
								<option value="HT">Haiti</option>
								<option value="HM">Heard Island and McDonald Islands</option>
								<option value="HN">Honduras</option>
								<option value="HK">Hong Kong S.A.R., China</option>
								<option value="HU">Hungary</option>
								<option value="IS">Iceland</option>
								<option value="IN">India</option>
								<option value="ID">Indonesia</option>
								<option value="IR">Iran</option>
								<option value="IQ">Iraq</option>
								<option value="IE">Ireland</option>
								<option value="IM">Isle of Man</option>
								<option value="IL">Israel</option>
								<option value="IT">Italy</option>
								<option value="CI">Ivory Coast</option>
								<option value="JM">Jamaica</option>
								<option value="JP">Japan</option>
								<option value="JE">Jersey</option>
								<option value="JO">Jordan</option>
								<option value="KZ">Kazakhstan</option>
								<option value="KE">Kenya</option>
								<option value="KI">Kiribati</option>
								<option value="KW">Kuwait</option>
								<option value="KG">Kyrgyzstan</option>
								<option value="LA">Laos</option>
								<option value="LV">Latvia</option>
								<option value="LB">Lebanon</option>
								<option value="LS">Lesotho</option>
								<option value="LR">Liberia</option>
								<option value="LY">Libya</option>
								<option value="LI">Liechtenstein</option>
								<option value="LT">Lithuania</option>
								<option value="LU">Luxembourg</option>
								<option value="MO">Macao S.A.R., China</option>
								<option value="MK">Macedonia</option>
								<option value="MG">Madagascar</option>
								<option value="MW">Malawi</option>
								<option value="MY">Malaysia</option>
								<option value="MV">Maldives</option>
								<option value="ML">Mali</option>
								<option value="MT">Malta</option>
								<option value="MH">Marshall Islands</option>
								<option value="MQ">Martinique</option>
								<option value="MR">Mauritania</option>
								<option value="MU">Mauritius</option>
								<option value="YT">Mayotte</option>
								<option value="MX">Mexico</option>
								<option value="FM">Micronesia</option>
								<option value="MD">Moldova</option>
								<option value="MC">Monaco</option>
								<option value="MN">Mongolia</option>
								<option value="ME">Montenegro</option>
								<option value="MS">Montserrat</option>
								<option value="MA">Morocco</option>
								<option value="MZ">Mozambique</option>
								<option value="MM">Myanmar</option>
								<option value="NA">Namibia</option>
								<option value="NR">Nauru</option>
								<option value="NP">Nepal</option>
								<option value="NL">Netherlands</option>
								<option value="AN">Netherlands Antilles</option>
								<option value="NC">New Caledonia</option>
								<option value="NZ">New Zealand</option>
								<option value="NI">Nicaragua</option>
								<option value="NE">Niger</option>
								<option value="NG">Nigeria</option>
								<option value="NU">Niue</option>
								<option value="NF">Norfolk Island</option>
								<option value="MP">Northern Mariana Islands</option>
								<option value="KP">North Korea</option>
								<option value="NO">Norway</option>
								<option value="OM">Oman</option>
								<option value="PK">Pakistan</option>
								<option value="PW">Palau</option>
								<option value="PS">Palestinian Territory</option>
								<option value="PA">Panama</option>
								<option value="PG">Papua New Guinea</option>
								<option value="PY">Paraguay</option>
								<option value="PE">Peru</option>
								<option value="PH">Philippines</option>
								<option value="PN">Pitcairn</option>
								<option value="PL">Poland</option>
								<option value="PT">Portugal</option>
								<option value="PR">Puerto Rico</option>
								<option value="QA">Qatar</option>
								<option value="RE">Reunion</option>
								<option value="RO">Romania</option>
								<option value="RU">Russia</option>
								<option value="RW">Rwanda</option>
								<option value="BL">Saint Barthélemy</option>
								<option value="SH">Saint Helena</option>
								<option value="KN">Saint Kitts and Nevis</option>
								<option value="LC">Saint Lucia</option>
								<option value="MF">Saint Martin (French part)</option>
								<option value="PM">Saint Pierre and Miquelon</option>
								<option value="VC">Saint Vincent and the Grenadines</option>
								<option value="WS">Samoa</option>
								<option value="SM">San Marino</option>
								<option value="ST">Sao Tome and Principe</option>
								<option value="SA">Saudi Arabia</option>
								<option value="SN">Senegal</option>
								<option value="RS">Serbia</option>
								<option value="SC">Seychelles</option>
								<option value="SL">Sierra Leone</option>
								<option value="SG">Singapore</option>
								<option value="SX">Sint Maarten</option>
								<option value="SK">Slovakia</option>
								<option value="SI">Slovenia</option>
								<option value="SB">Solomon Islands</option>
								<option value="SO">Somalia</option>
								<option value="ZA">South Africa</option>
								<option value="GS">South Georgia and the South Sandwich Islands</option>
								<option value="KR">South Korea</option>
								<option value="SS">South Sudan</option>
								<option value="ES">Spain</option>
								<option value="LK">Sri Lanka</option>
								<option value="SD">Sudan</option>
								<option value="SR">Suriname</option>
								<option value="SJ">Svalbard and Jan Mayen</option>
								<option value="SZ">Swaziland</option>
								<option value="SE">Sweden</option>
								<option value="CH">Switzerland</option>
								<option value="SY">Syria</option>
								<option value="TW">Taiwan</option>
								<option value="TJ">Tajikistan</option>
								<option value="TZ">Tanzania</option>
								<option value="TH">Thailand</option>
								<option value="TL">Timor-Leste</option>
								<option value="TG">Togo</option>
								<option value="TK">Tokelau</option>
								<option value="TO">Tonga</option>
								<option value="TT">Trinidad and Tobago</option>
								<option value="TN">Tunisia</option>
								<option value="TR">Turkey</option>
								<option value="TM">Turkmenistan</option>
								<option value="TC">Turks and Caicos Islands</option>
								<option value="TV">Tuvalu</option>
								<option value="VI">U.S. Virgin Islands</option>
								<option value="UG">Uganda</option>
								<option value="UA">Ukraine</option>
								<option value="AE">United Arab Emirates</option>
								<option value="GB">United Kingdom</option>
								<option value="US" selected="selected">United States</option>
								<option value="UM">United States Minor Outlying Islands</option>
								<option value="UY">Uruguay</option>
								<option value="UZ">Uzbekistan</option>
								<option value="VU">Vanuatu</option>
								<option value="VA">Vatican</option>
								<option value="VE">Venezuela</option>
								<option value="VN">Vietnam</option>
								<option value="WF">Wallis and Futuna</option>
								<option value="EH">Western Sahara</option>
								<option value="YE">Yemen</option>
								<option value="ZM">Zambia</option>
								<option value="ZW">Zimbabwe</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="shippingCity" class="col-md-2 control-label">{{trans('general.city')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_city" class="form-control" id="shippingCity" placeholder="City">
						</div>
					</div>
					<div class="form-group">
						<label for="shippingPostalCode" class="col-md-2 control-label">{{trans('general.zip')}}<small class="text-default">*</small></label>
						<div class="col-md-10">
							<input type="text" name="shipping_zip" class="form-control" id="shippingPostalCode" placeholder="{{trans('general.zip')}}">
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