@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-code"></i> 
            	Scripts
            </span>
            <span class="pull-right">
                <a href='{{route('admin.scripts.index')}}' class="btn btn-light" title="Back To Scripts">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    Back To Scripts
                </a>
            </span>
        </div>
        <div class="widget-body">
			{!! Form::open(array('route' => 'admin.scripts.store', 'method' => 'POST')) !!}
                {!! csrf_field() !!}
				<div class="form-group">
				    {!! Form::label('name', 'Name:') !!}
				    {!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder'=>'Name', 'autofocus' => true ]) !!}
				    {!! $errors->first('name') !!}
				</div>

				<div class="form-group">
				    {!! Form::label('code', 'Code:') !!}
				     <span class="input-icon icon-right">
			        	{!! Form::textarea('code', null, [ 'class' => 'form-control', 'placeholder'=>'Code']) !!}
			    	    <i class="fa fa-code darkorange"></i>
			    	</span>
				    {!! $errors->first('code') !!}
				</div>

				<div class="form-group">
				    {!! Form::label('active', 'Active:') !!} <br>
				    <label>
				    {!! Form::checkbox('active', null, null, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
				    <span class="text"></span>
				    </label>
				    {!! $errors->first('active') !!}
				</div>			
				{!! Form::button('Create Script', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection