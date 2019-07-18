@extends('layouts.app')

@section('content')
	<div class="widget">
	    <div class="widget-header bordered-bottom bordered-blue">
	        <span class="widget-caption">
	            <i class="fa fa-pencil"></i> 
	        	Create FAQ Category 
	        </span>
	        <span class="pull-right">
	            <a href='{{route('admin.faq-categories.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left">
	                <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
	                Back to FAQ Categories
	            </a>
	        </span>
	    </div>
	    <div class="widget-body">
	        {!! Form::open(array('route' => 'admin.faq-categories.store', 'method' => 'POST')) !!}
	            {!! csrf_field() !!}
	                <div class="form-group">
	                    {!! Form::label('name', 'Name:') !!}
	                    {!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder'=>'Name', 'autofocus' => true ]) !!}
	                    {!! $errors->first('name') !!}
	                </div>
	                <div class="form-group">
	                    {!! Form::label('icon', 'Icon:') !!} <span>Search corresponding icon on <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">this link</a> and copy its name.</span>
	                    {!! Form::text('icon', null, [ 'class' => 'form-control', 'placeholder'=>'Icon', 'autofocus' => true ]) !!}
	                    {!! $errors->first('icon') !!}
	                </div>
	                {!! Form::button('Create FAQ Category', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
	        {!! Form::close() !!}
	    </div>
	</div>
@endsection