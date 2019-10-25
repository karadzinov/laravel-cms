<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pay</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script>
		// Called when token created successfully.
		var successCallback = function(data) {
		  var myForm = document.getElementById('paymentFrm');
		  
		  // Set the token as the value for the token input
		  myForm.token.value = data.response.token.token;
		  
		  // Submit the form
		  myForm.submit();
		};

		// Called when token creation fails.
		var errorCallback = function(data) {
		  if (data.errorCode === 200) {
		    tokenRequest();
		  } else {
		    alert(data.errorMsg);
		  }
		};

		var tokenRequest = function() {
		  // Setup token request arguments
		  var args = {
		    sellerId: "{{config('two-checkout.seller_id')}}",
		    publishableKey: "{{config('two-checkout.public_key')}}",
		    ccNo: $("#card_num").val(),
		    cvv: $("#cvv").val(),
		    expMonth: $("#exp_month").val(),
		    expYear: $("#exp_year").val()
		  };
		  
		  // Make the token request
		  TCO.requestToken(successCallback, errorCallback, args);
		};

		$(function() {
		  // Pull in the public encryption key for our environment
		  TCO.loadPubKey('sandbox');
		  
		  $("#paymentFrm").submit(function(e) {
		    // Call our token request function
		    tokenRequest();
		   
		    // Prevent form from submitting
		    return false;
		  });
		});
	</script>
	<style>
		/* Padding - just for asthetics on Bootsnipp.com */
		body { margin-top:20px; }

		/* CSS for Credit Card Payment form */
		.credit-card-box .panel-title {
		    display: inline;
		    font-weight: bold;
		}
		.credit-card-box .form-control.error {
		    border-color: red;
		    outline: 0;
		    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
		}
		.credit-card-box label.error {
		  font-weight: bold;
		  color: red;
		  padding: 2px 8px;
		  margin-top: 2px;
		}
		.credit-card-box .payment-errors {
		  font-weight: bold;
		  color: red;
		  padding: 2px 8px;
		  margin-top: 2px;
		}
		.credit-card-box label {
		    display: block;
		}
		/* The old "center div vertically" hack */
		.credit-card-box .display-table {
		    display: table;
		}
		.credit-card-box .display-tr {
		    display: table-row;
		}
		.credit-card-box .display-td {
		    display: table-cell;
		    vertical-align: middle;
		    width: 50%;
		}
		/* Just looks nicer */
		.credit-card-box .panel-heading img {
		    min-width: 180px;
		}
		.credit-card-box{
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="container">
	    <div class="row">
	        <!-- You can make it whatever width you want. I'm making it full width
	             on <= small devices and 4/12 page width on >= medium devices -->
	        <div class="col-lg-4 col-md-4 col-xs-12"></div>
	        <div class="col-lg-4 col-md-4 col-xs-12">
	        
	        
	            <!-- CREDIT CARD FORM STARTS HERE -->
	            <div class="panel panel-default credit-card-box">
	                <div class="panel-heading display-table" >
	                    <div class="row display-tr" >
	                        <h3 class="panel-title display-td" >Payment Details</h3>
	                        <div class="display-td" >                            
	                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
	                        </div>
	                    </div>                    
	                </div>
	                <div class="panel-body">
	                    <form id="paymentFrm" method="post" action="{{route('charge')}}">
	                    	@csrf
	                        <div class="row">
	                            <div class="col-xs-12">
	                                <div class="form-group">
	                                    <label for="cardNumber">CARD NUMBER</label>
	                                    <div class="input-group">
	                                    	 <input type="tel" name="card_num" class="form-control" id="card_num" placeholder="Enter card number" autocomplete="off" required>
	                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
	                                    </div>
	                                </div>                            
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-xs-7 col-md-7">
	                                <div class="form-group">
	                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                	    <input type="number" class="form-control" name="exp_month" id="exp_month" placeholder="MM" max="12" oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, this.maxLength);" required>
                                	    <input type="number" name="exp_year" class="form-control" id="exp_year" placeholder="YY" oninput="javascript: if (this.value.length > 4) this.value = this.value.slice(0, this.maxLength);" required>
	                                </div>
	                            </div>
	                            <div class="col-xs-5 col-md-5 pull-right">
	                                <div class="form-group">
	                                    <label for="cardCVC">CV CODE</label>
	            						<input type="number" name="cvv" class="form-control" id="cvv" autocomplete="off" oninput="javascript: if (this.value.length > 4) this.value = this.value.slice(0, this.maxLength);" required>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-xs-12">
	                            	<!-- hidden token input -->
	                            	<input id="token" name="token" type="hidden" value="">
	                            	
	                            	<!-- submit button -->
	                            	<input type="submit" class="btn btn-success btn-lg btn-block" value="Submit Payment">
	                            </div>
	                        </div>
	                        <div class="row" style="display:none;">
	                            <div class="col-xs-12">
	                                <p class="payment-errors"></p>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>            
	            <!-- CREDIT CARD FORM ENDS HERE -->
	        </div>
	    </div>
	</div>
	<script>
		function checkNumberLength(maxLength){
			console.log(this)
			// if (this.value.length > maxLength){
			// 	this.value = this.value.slice(0, this.maxLength);
			// }
		}
	</script>
</body>
</html>