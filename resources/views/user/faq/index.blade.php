@extends('layouts/master')

@section('content')
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
				<li class="active">Frequently Asked Questions</li>
			</ol>
		</div>
	</div>
	<!-- breadcrumb end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			@if($faqs->isNotEmpty())
				<div class="row">

					<!-- main start -->
					<!-- ================ -->
					<div class="main col-md-8">

						<!-- page-title start -->
						<!-- ================ -->
						<h1 class="page-title">Frequently Asked Questions</h1>
						<div class="separator-2"></div>
						<!-- page-title end -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ut quisquam ab harum hic enim quibusdam aut quasi recusandae temporibus quo voluptatibus, dolorem consectetur ipsam facere ipsa. Commodi sunt, inventore!</p>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs style-1" role="tablist">
							<li class="active"><a href="#tab1" role="tab" data-toggle="tab"><i class="fa  fa-life-saver pr-10"></i>Questions</a></li>
							{{-- <li><a href="#tab2" role="tab" data-toggle="tab"><i class="fa fa-user pr-10"></i>Sales</a></li> --}}
							{{-- <li><a href="#tab3" role="tab" data-toggle="tab"><i class="fa fa-star pr-10"></i>Popular Topics</a></li> --}}
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<!-- accordion start -->
								<div class="panel-group collapse-style-1" id="accordion-faq">
									@foreach($faqs as $faq)
										@include('partials/user/faqs/item')
									@endforeach
								</div>
								<!-- accordion end -->
							</div>
						</div>
					</div>
					<!-- main end -->

					<!-- sidebar start -->
					<!-- ================ -->
					<aside class="col-md-4 col-lg-3 col-lg-offset-1">
						<div class="sidebar">
							<div class="block clearfix">
								<h3 class="title">Submit Your Question</h3>
								<div class="separator-2"></div>
								<div class="alert alert-success hidden" id="MessageSent3">
									We have received your message, we will contact you very soon.
								</div>
								<div class="alert alert-danger hidden" id="MessageNotSent3">
									Oops! Something went wrong please refresh the page and try again.
								</div>
								<form role="form" id="sidebar-form" class="margin-clear">
									<div class="form-group has-feedback">
										<label for="name3">Name</label>
										<input type="text" class="form-control" id="name3" placeholder="Enter your name" name="name3">
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="email3">Email address</label>
										<input type="email" class="form-control" id="email3" placeholder="Enter your email" name="email3">
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group">
										<label>Category</label>
										<select class="form-control" id="category">
											<option value="Sales">Sales</option>
											<option value="Support">Support</option>
											<option value="Lorem">Lorem</option>
											<option value="Ipsum sit">Ipsum sit</option>
											<option value="Dolor amet">Dolor amet</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label for="message3">Message</label>
										<textarea class="form-control" rows="4" id="message3" placeholder="" name="message3"></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<input type="submit" value="Submit" class="submit-button btn btn-default">
								</form>
							</div>								
							<div class="block clearfix">
								<h3 class="title">Text Sample</h3>
								<div class="separator-2"></div>
								<p>Consectetur adipisicing. Repellendus neque doloremque, quasi earum voluptatum velit eveniet commodi vel, beatae consequuntur vero ex facilis blanditiis excepturi numquam pariatur ipsum ipsam voluptates!</p>
							</div>							
						</div>
					</aside>
					<!-- sidebar end -->
				</div>
			@else
				<div class="text-center pv-40">
					<p class="lead center">There is no questions to be answered.</p>
				</div>
			@endif
		</div>
	</section>
	<!-- main-container end -->
@endsection