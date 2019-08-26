@extends($path . 'master')

@section('content')
	<!-- 
	Available heights
		h-100
		h-150
		h-200
		h-250
		h-300
		h-350
		h-400
		h-450
		h-500
		h-550
		h-600
	-->
	<div id="map-canvas" class="h-400"></div>



	<!-- 
		PAGE HEADER 
		
		CLASSES:
			.page-header-xs	= 20px margins
			.page-header-md	= 50px margins
			.page-header-lg	= 80px margins
			.page-header-xlg= 130px margins
			.dark			= dark page header

			.shadow-before-1 	= shadow 1 header top
			.shadow-after-1 	= shadow 1 header bottom
			.shadow-before-2 	= shadow 2 header top
			.shadow-after-2 	= shadow 2 header bottom
			.shadow-before-3 	= shadow 3 header top
			.shadow-after-3 	= shadow 3 header bottom
	-->
	<section class="page-header page-header-xs">
		<div class="container text-right">

			<!-- breadcrumbs -->
			<ol class="breadcrumb  breadcrumb-inverse">
				<li><a href="{{route('public.home')}}">{{trans('general.navigation.home')}}</a></li>
				<li class="active">{{trans('general.navigation.contact')}}</li>
			</ol><!-- /breadcrumbs -->

		</div>
	</section>
	<!-- /PAGE HEADER -->



	<!-- -->
	<section>
		<div class="container">
			
		<div class="row">

				<!-- FORM -->
				<div class="col-md-9">

					<h3>{{trans('general.contact_us')}}</h3>

					<!-- Alert Success -->
					<div id="alert_success" class="alert alert-success mb-30">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{trans('general.soon_response')}}
					</div><!-- /Alert Success -->


					<!-- Alert Failed -->
					<div id="alert_failed" class="alert alert-danger mb-30">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{trans('general.error_message')}}
					</div><!-- /Alert Failed -->


					<!-- Alert Mandatory -->
					<div id="alert_mandatory" class="alert alert-danger mb-30">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{trans('general.validation_message')}}
					</div><!-- /Alert Mandatory -->


					<form method="POST" enctype="multipart/form-data" id="contact-form">
						{{csrf_field()}}
						<fieldset>
							<input type="hidden" name="action" value="contact_send" />

							<div class="row">
								<div class="col-md-6">
									<label for="name">{{trans('general.name')}} *</label>
									<input required type="text" value="" class="form-control" name="name" id="name">
								</div>
								<div class="col-md-6">
									<label for="email">{{trans('general.email')}} *</label>
									<input required type="email" value="" class="form-control" name="email" id="email">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="subject">{{trans('general.subject')}} *</label>
									<input required type="text" value="" class="form-control" name="subject" id="subject">
								</div>
							</div>
							<div class="clearfix">
								<label for="message">{{trans('general.message')}} *</label>
								<textarea required maxlength="10000" rows="8" class="form-control" name="message" id="message"></textarea>
							</div>
						</fieldset>

						<div class="row">
							<div class="col-md-12">
								<button id="submit-contact-form" class="btn btn-primary">
									<i class="fa fa-check"></i> {{trans('general.send-message')}}
								</button>
							</div>
						</div>
					</form>

				</div>
				<!-- /FORM -->


				<!-- INFO -->
				<div class="col-md-3">
					
					<p>
						{{trans('general.if-questions')}}
					</p>
					<hr>
					<h2>{{trans('general.find_us')}}</h2>
					
					<p>
						<span class="block"><strong><i class="fa fa-map-marker"></i> {{trans('general.address')}}:</strong> {{$settings->address}}</span>
						<span class="block">
							<strong>
								<i class="fa fa-phone"></i> {{trans('general.phone')}}:
							</strong> 
							<a href="tel:{{$settings->phone_number}}">
								{{$settings->phone_number}}
							</a>
						</span>
						<span class="block"><strong><i class="fa fa-envelope"></i> {{trans('general.email')}}:</strong> <a href="mailto:{{$settings->email}}">{{$settings->email}}</a></span>
					</p>

					<hr />
					<div class="hidden-xs-down text-center">
						<a target="_blank" href="#" class="social-icon social-icon-border btn-round btn-shadow-1 social-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a target="_blank" href="#" class="social-icon social-icon-border btn-round btn-shadow-1 social-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>

						<a target="_blank" href="#" class="social-icon social-icon-border btn-round btn-shadow-1 social-linkedin" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
							<i class="icon-linkedin"></i>
							<i class="icon-linkedin"></i>
						</a>
						<a target="_blank" href="#" class="social-icon social-icon-border btn-round btn-shadow-1 social-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
							<i class="fa fa-instagram"></i>
							<i class="fa fa-instagram"></i>
						</a>
						<a target="_blank" href="//www.ios.com" class="social-icon social-icon-border btn-round btn-shadow-1 social-ios" data-toggle="tooltip" data-placement="top" title="" data-original-title="IOS">
							<i class="fa fa-apple"></i>
							<i class="fa fa-apple"></i>
						</a>
						<a target="_blank" href="#" class="social-icon social-icon-border btn-round btn-shadow-1 social-android" data-toggle="tooltip" data-placement="top" title="" data-original-title="Android">
							<i class="fa fa-android"></i>
							<i class="fa fa-android"></i>
						</a>
					</div>

				</div>
				<!-- /INFO -->

			</div>

		</div>
	</section>
	<!-- / -->
@endsection

@section('optionalScripts')
	<script>
		
		$('#submit-contact-form').on('click', function(e){
			e.preventDefault();
			$.ajaxSetup({
			    headers:
			    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			});
			$.ajax({
				type: "POST",
				url: "{{route('contactEmail')}}",
				data: {
					"name": $("#contact-form #name").val(),
					"email": $("#contact-form #email").val(),
					"subject": $("#contact-form #subject").val(),
					"message": $("#contact-form #message").val()
				},
				success: function (data) {
					if (data.sent == "yes") {
						$('#alert_success').slideDown();
						$("#submit-contact-form").html('<i class="fa fa-check"></i> {{trans('general.message-sent')}}');
						$("#contact-form .form-control").each(function() {
							$(this).prop('value', '');
						});
						$('#submit-contact-form').attr('disabled', true);
					}
				},
				error: function(response){
					if(response.status === 422) {
						slideDownAndUp('#alert_mandatory');
					} else {
						slideDownAndUp('#alert_failed');
					}

				},
			});
		});
		function slideDownAndUp(tag){
			$(tag).slideDown();
			setTimeout(function(){
				$(tag).slideUp();
			}, 4000);
		}
	</script>
@endsection