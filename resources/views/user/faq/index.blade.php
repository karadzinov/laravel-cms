@extends('layouts/master')
{{-- {{dd(App::getLocale())}} --}}
@section('content')
	{{-- <div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
				<li class="active">{{trans('general.faq')}}</li>
			</ol>
		</div>
	</div> --}}
	<!-- breadcrumb end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			@if($categories->isNotEmpty())
				<div class="row">

					<!-- main start -->
					<!-- ================ -->
					<div class="main col-md-8">

						<!-- page-title start -->
						<!-- ================ -->
						<h1 class="page-title">{{trans('general.faq')}}</h1>
						<div class="separator-2"></div>
						<!-- page-title end -->
						<p>{{trans('general.faq_top_text')}}</p>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs style-1" role="tablist">
							@foreach($categories as $category)
								<li class="@if($loop->iteration === 1) active @endif">
									<a href="#faqCategory-{{$category->id}}" role="tab" data-toggle="tab">
										<i class="fa  fa-{{$category->icon}} pr-10"></i>
										{{$category->name}}
									</a>
								</li>
							@endforeach
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							@foreach($categories as $category)
								<div class="tab-pane @if($loop->iteration === 1) fade in active @endif" id="faqCategory-{{$category->id}}">
									<!-- accordion start -->
									<div class="panel-group collapse-style-1" id="accordion-faq-{{$category->id}}">
										@foreach($category->faqs as $faq)
											@include('partials/user/faqs/item')
										@endforeach
									</div>
									<!-- accordion end -->
								</div>
							@endforeach
						</div>
					</div>
					<!-- main end -->

					<!-- sidebar start -->
					<!-- ================ -->
					<aside class="col-md-4 col-lg-3 col-lg-offset-1">
						<div class="sidebar">
							<div class="block clearfix">
								<h3 class="title">{{trans('general.submit_question')}}</h3>
								<div class="separator-2"></div>
								<div class="alert alert-success hidden" id="MessageSent3">
									{{trans('general.soon_response')}}
								</div>
								<div class="alert alert-danger hidden" id="MessageNotSent3">
									{{trans('general.error_response')}}
								</div>
								<form role="form" id="sidebar-form" class="margin-clear">
									<div class="form-group has-feedback">
										<label for="name3">{{trans('general.name')}}</label>
										<input type="text" class="form-control" id="name3" placeholder="{{trans('general.enter_your_name')}}" name="name3">
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="email3">{{trans('general.email')}}</label>
										<input type="email" class="form-control" id="email3" placeholder="{{trans('general.enter_your_email')}}" name="email3">
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group">
										<label>{{trans('general.category')}}</label>
										<select class="form-control" id="category">
											@foreach($categories as $category)
												<option value="{{$category->name}}">{{$category->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group has-feedback">
										<label for="message3">{{trans('general.message')}}</label>
										<textarea class="form-control" rows="4" id="message3" placeholder="" name="message3"></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<input type="submit" value="{{trans('general.submit')}}" class="submit-button btn btn-default">
								</form>
							</div>													
						</div>
					</aside>
					<!-- sidebar end -->
				</div>
			@else
				@include('partials/user/comingSoon')
			@endif
		</div>
	</section>
	<!-- main-container end -->
@endsection