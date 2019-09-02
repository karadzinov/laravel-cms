@extends($path . 'master')

@section('optionalHead')
	<style>
		#header.translucent{
			position: relative;
		}
		#contact-category{
			display: block;
		    box-sizing: border-box;
		    -moz-box-sizing: border-box;
		    width: 100%;
		    height: 40px;
		    padding: 8px 10px;
		    outline: 0;
		    border-width: 2px;
		    border-style: solid;
		    border-radius: 0;
		    background: #fff;
		    font: 15px/19px 'Open Sans',Helvetica,Arial,sans-serif;
		    color: #404040;
		    appearance: normal;
		    -moz-appearance: none;
			padding-left: 40px;

		}
		#contact-category {
		  color: #9C9F9F;
		}
		option:first-of-type{
		  color: #9C9F9F;

		}
		option:not(:first-of-type) {
		  color: #404040;
		}
	</style>
@endsection

@section('content')

	@if($categories->isNotEmpty())
		<section class="page-header parallax parallax-3" style="background-image:url('{{asset('assets/theme-2/images/_smarty/imgpattern2.jpg')}}')">
			<div class="overlay dark-0"><!-- dark overlay [0 to 9 opacity] --></div>

			<div class="container">

				<h1>{{trans('general.faq')}}</h1>

				<!-- breadcrumbs -->
				<ol class="breadcrumb">
					<li><a href="javascript:void(0)">{{trans('general.navigation.home')}}</a></li>
					<li class="active">{{trans('general.faq')}}</li>
				</ol><!-- /breadcrumbs -->

			</div>
		</section>

		<!-- -->
		<section>
			<div class="container">

				<!-- FILTER -->
				<ul class="nav nav-pills mix-filter mb-30">
					<li data-filter="all" class="filter active"><a href="javascript:void(0)">All</a></li>
					@foreach($categories as $category)
						<li data-filter="{{$category->name}}" class="filter"><a href="javascript:void(0)">{{$category->name}}</a></li>
					@endforeach
				</ul>
				<!-- /FILTER -->

				<div class="row mix-grid">

					<!-- LEFT COLUMNS -->
					<div class="col-md-9">

						<!-- TOGGLES -->
						<div class="toggle toggle-transparent toggle-bordered-simple">
							@foreach($faqs as $faq)
								<div class="toggle mix {{$faq->category->name}}"><!-- toggle -->
									<label>{{$loop->iteration}}. {{$faq->question}} ?</label>
									<div class="toggle-content">
										<p class="clearfix">
											{{$faq->answer}}
										</p>

									</div>
								</div><!-- /toggle -->

							@endforeach
						</div>
						<!-- /TOGGLES -->

					</div>
					<!-- /LEFT COLUMNS -->

					<!-- RIGHT COLUMNS -->
					<div class="col-md-3">
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
						<!-- ASK A QUSTION -->
						<h4>{{trans('general.ask-question')}}</h4>
						<form id="#contact-form" class="sky-form clearfix">

							<label class="input">
								<i class="ico-prepend fa fa-user"></i>
								<input class="form-field" id="contact-name" type="text" placeholder="{{trans('general.name')}}">
							</label>

							<label class="input">
								<i class="ico-prepend fa fa-envelope"></i>
								<input class="form-field" id="contact-email" type="text" placeholder="{{trans('general.email')}}*">
							</label>

							<label class="input">
								<i class="ico-prepend fa fa-bars"></i>
								<select id="contact-category" class="form-field">
									<option id="select-placeholder" value="" disabled selected>{{trans('general.select-category')}}</option>
									@foreach($categories as $category)
										<option value="{{$category->name}}">{{$category->name}}</option>
									@endforeach
								</select>
							</label>

							<label class="textarea">
								<i class="ico-prepend fa fa-comment"></i>
								<textarea id="contact-message" rows="3" placeholder="{{trans('general.type-question')}}*" class="form-field"></textarea>
							</label>

							<button id="submit-contact-form" class="btn btn-primary btn-sm float-right">{{trans('general.submit-question')}}</button>

						</form>

					</div>
					<!-- /RIGHT COLUMNS -->

				</div>
				
			</div>
		</section>
		<!-- / -->
	@else
		@include($path . 'comingSoon')
	@endif
		
@endsection

@section('optionalScripts')
	<script>
		$('#contact-category').on('change', function(){
			$(this).css('color', '#404040');
		});

		$('#submit-contact-form').on('click', function(e){
			e.preventDefault();
			var url = window.location.host + '/faqs';
			var faqpageUrl = ' [Faq Page](//' + url + ')';
			$.ajaxSetup({
			    headers:
			    { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
			});
			$.ajax({
				type: "POST",
				url: "{{route('faqEmail')}}",
				data: {
					"name": $("#contact-name").val(),
					"email": $("#contact-email").val(),
					"category": $("#contact-category").val(),
					"message": $("#contact-message").val(),
					"subject": "Message from" + faqpageUrl,
				},
				success: function (response) {
					
					if (response.sent == "yes") {
						let submitButton = $("#submit-contact-form");
						$('#alert_success').slideDown();
						submitButton.html('<i class="fa fa-check"></i> {{trans('general.message-sent')}}');
						$(".form-field").each(function() {
							$(this).val('');
						});
						submitButton.addClass('btn-success');
						submitButton.attr('disabled', true);
					}else if(response.status === 422) {
						slideDownAndUp('#alert_mandatory');
					}
				},
				error: function(response){
					
					slideDownAndUp('#alert_failed');
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