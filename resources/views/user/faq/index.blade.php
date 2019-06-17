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
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion-faq" href="#{{$faq->id}}" class="collapsed">
														<i class="fa fa-question-circle pr-10"></i> 
														{{$faq->question}}
													</a>
												</h4>
											</div>
											<div id="{{$faq->id}}" class="panel-collapse collapse">
												<div class="panel-body">
													{{$faq->answer}}
												</div>
											</div>
										</div>
									@endforeach
								</div>
								<!-- accordion end -->
							</div>
							{{-- <div class="tab-pane fade" id="tab2">
								<!-- accordion start -->
								<div class="panel-group collapse-style-1" id="accordion-faq-2">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion-faq-2" href="#collapseOne-2"  class="collapsed">
													<i class="fa fa-question-circle pr-10"></i> Ipsum dolor sit amet, consectetur adipisicing elit.
												</a>
											</h4>
										</div>
										<div id="collapseOne-2" class="panel-collapse collapse">
											<div class="panel-body">
												Enim, deleniti atque error corporis, laudantium consequuntur et ipsum velit, laboriosam sint inventore nam quo dolorum. Totam, facilis. Unde nobis cumque quam modi quia doloribus nesciunt eveniet, reprehenderit iste blanditiis ipsa, dolor nemo nulla harum quibusdam ipsum expedita explicabo obcaecati ab amet labore tempore sequi. Sed nam quidem tempore laboriosam ipsa perferendis officiis quos sapiente mollitia facilis earum, reprehenderit corporis eum dolore, ratione reiciendis expedita. Iste tenetur eos molestias dicta itaque adipisci cum laudantium aperiam atque, consequuntur, inventore possimus accusamus nisi a quaerat totam est aliquid alias amet id nulla quia illum illo. Quibusdam expedita omnis est hic, ipsum quo impedit! Facere voluptates repudiandae sunt quos inventore exercitationem quas distinctio ducimus vitae iure eos est, natus voluptatum! Odio totam ipsam natus sed, a, vel, corrupti molestiae magnam dicta officia eveniet temporibus perspiciatis aperiam aliquid cumque mollitia, quibusdam! Consequuntur eum aut aspernatur reprehenderit.
											</div>
										</div>
									</div>
								</div>
								<!-- accordion end -->
							</div>
							<div class="tab-pane fade" id="tab3">
								<!-- accordion start -->
								<div class="panel-group collapse-style-1" id="accordion-faq-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion-faq-3" href="#collapseOne-3" class="collapsed">
													<i class="fa fa-question-circle pr-10"></i> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
												</a>
											</h4>
										</div>
										<div id="collapseOne-3" class="panel-collapse collapse">
											<div class="panel-body">
												Distinctio dolor assumenda optio a adipisci inventore culpa tempora molestias fuga cupiditate alias sint labore, quod minus iusto ad earum, vel nihil ipsum necessitatibus maxime facere? Corporis inventore, saepe placeat labore rerum assumenda repudiandae, eveniet aperiam dolor quibusdam porro nesciunt omnis voluptatum, perspiciatis. Doloremque perspiciatis quas sunt, similique modi facere a atque unde impedit assumenda accusantium vel animi iste omnis cupiditate amet quae ipsam repudiandae sint doloribus praesentium natus magnam et minima consequatur. Facilis corporis similique reiciendis officiis veritatis consectetur est rerum natus, hic illo molestiae voluptas numquam enim aut fugit possimus, ducimus ipsam quisquam, ab doloribus. Deleniti quam repudiandae eos, maxime commodi quas sit accusamus error eius. Ea temporibus eos, iusto!
											</div>
										</div>
									</div>
								</div>
								<!-- accordion end -->
							</div> --}}
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
				<p class="lead">There is no questions to be answered.</p>			
			@endif
		</div>
	</section>
	<!-- main-container end -->
	
	<!-- footer top start -->
	<!-- ================ -->
	<div class="dark-bg  default-hovered footer-top animated-text">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action text-center">
						<div class="row">
							<div class="col-sm-8">
								<h2>Powerful Bootstrap Template</h2>
								<h2>Waste no more time</h2>
							</div>
							<div class="col-sm-4">
								<p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent ">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer top end -->
@endsection