@extends('admin/master')
@section('head')
	<style>
		.widget-body{
			/*background: white !important;*/
			min-height: 100vh;
		}
		.mt-30{
			margin-top: 30px;
		}
		.mb-30{
			margin-bottom: 30px;
		}
		.chart{
			width: 100%;
			height: 500px;
			background-color: white;
			padding: 20px;
			
		}
		.world-map{
			width: 100%
		}
		#top_x_div div{
			max-width: 100px !important;
		}
	</style>
@endsection
@section('content')
	<div class="widget-body">
	    <div class="container">
	        <div class="row">
	            <div class="col-12 col-lg-10 offset-lg-1">

	                @include('admin/welcome-panel')

	            </div>
	        </div>
	    </div>
	    @if(env('ANALYTICS_VIEW_ID'))
			@include('admin/partials/google-analytics')
		@endif
	</div>

@endsection