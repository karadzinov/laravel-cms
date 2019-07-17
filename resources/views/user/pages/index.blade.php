@extends('layouts/master')
@section('content')
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-home pr-10"></i>
					<a href="/">
						Home
					</a>
				</li>
				<li class="active">Pages</li>
			</ol>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="main col-md-12">
				<!-- page-title start -->
				<!-- ================ -->
				<h1 class="page-title text-center">Pages</h1>
				<div class="separator with-icon"><i class="fa fa-desktop bordered"></i></div>
				<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				<br>
				<br>
				<!-- page-title end -->
				<div class="masonry-grid row">
					@include('partials/user/pages/pages-list')
				</div>
			</div>
		</div>
	</div>
@endsection