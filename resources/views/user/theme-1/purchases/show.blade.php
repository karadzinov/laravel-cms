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
					<h1 class="page-title">Shop Product</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->

					<div id="invoice-container" class="invoice-container" id="invoice-container">
						<div class="row">
							<div class="col-sm-6">
								<img src="images/logo_light_blue.png" alt="logo">
								<p class="invoice-slogan">Your Slogan Here</p>
								<address class="small">
									<strong>The Project, Inc.</strong><br>
									795 Folsom Ave, Suite 600<br>
									San Francisco, CA 94107<br>
									<abbr title="Phone">P:</abbr> (123) 456-7890<br>
									E-mail: <a href="mailto:theproject@info.com">theproject@info.com</a>
								</address>
							</div>
							<div class="col-sm-offset-3 col-sm-3">
								<p class="text-right small"><strong>Invoice #001</strong> <br> May 15, 2015</p>
								<h5 class="text-right">Client</h5>
								<p class="text-right small">
									<strong>Name:</strong> <span>John Doe</span> <br>
									<strong>Company:</strong> John Doe <br>
									<strong>Address:</strong> 795 Folsom Ave, Suite 600 <br>
									<strong>Tel:</strong> +12 123 123 1234 <br>
									<strong>Vat:</strong> 1231231231
								</p>
							</div>
						</div>
						<p class="small"><strong>Comments/PO:</strong> Lorem ipsum dolor sit amet, consectetur.</p>
						<table class="table cart table-bordered">
							<thead>
								<tr>
									<th>Description </th>
									<th>Price </th>
									<th>Quantity</th>
									<th class="amount">Total </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="product"><a href="shop-product.html">Product Title 1</a> <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</small></td>
									<td class="price">$99.50 </td>
									<td class="quantity">2 </td>
									<td class="amount">$199.00 </td>
								</tr>
								<tr>
									<td class="product"><a href="shop-product.html">Product Title 2</a> <small>Quas inventore modi</small></td>
									<td class="price"> $99.66 </td>
									<td class="quantity">3 </td>
									<td class="amount">$299.00 </td>
								</tr>
								<tr>
									<td class="product"><a href="shop-product.html">Product Title 3</a> <small>Fugiat nemo enim officiis repellendus</small></td>
									<td class="price"> $499.66 </td>
									<td class="quantity">3 </td>
									<td class="amount">$1499.00 </td>
								</tr>
								<tr>
									<td class="total-quantity" colspan="3">Subtotal</td>
									<td class="amount">$1997.00</td>
								</tr>
								<tr>
									<td class="total-quantity" colspan="1">Discount Coupon</td>
									<td class="price">TheProject25672</td>
									<td class="price">-20%</td>
									<td class="amount">-$399.40</td>
								</tr>
								<tr>
									<td class="total-quantity" colspan="2">Sales Tax</td>
									<td class="price">+10%</td>
									<td class="amount">$159.76</td>
								</tr>
								<tr>										
									<td class="total-quantity" colspan="3">Shipping</td>
									<td class="amount">$12.00</td>
								</tr>
								<tr>
									<td class="total-quantity" colspan="3">Total 8 Items</td>
									<td class="total-amount">$1769.36</td>
								</tr>
							</tbody>
						</table>
						<p class="small">If you have any questions concerning this invoice, contact <strong>The Project Inc.</strong>, tel: <strong>+12 123 123 1234</strong>, email: <strong>theproject@info.com</strong> <br> Thank you for your business!</p>
						<hr>
					</div>
					<div class="text-right">	
						<button onclick="printInvoice();" class="btn btn-print btn-default-transparent btn-hvr hvr-shutter-out-horizontal">Print <i class="fa fa-print pl-10"></i></button>
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