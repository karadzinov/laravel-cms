@extends('admin/master')

@section('pageTitle')
    {{trans('scripts.scripts')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-code"></i> 
            	{{trans('ascripts.scripts')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.scripts.index')}}' class="btn btn-light" title="Back To Scripts">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('scripts.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
			{!! Form::open(array('route' => 'admin.scripts.store', 'method' => 'POST')) !!}
                {!! csrf_field() !!}
				<div class="form-group">
				    {!! Form::label('name', trans('admin.name')) !!}
				    {!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder'=>trans('admin.name'), 'autofocus' => true ]) !!}
				    {!! $errors->first('name') !!}
				</div>

				<div class="form-group">
				    {!! Form::label('code', trans('admin.code')) !!}
				     <span class="input-icon icon-right">
			        	{!! Form::textarea('code', null, [ 'class' => 'form-control', 'placeholder'=>trans('admin.code')]) !!}
			    	    <i class="fa fa-code darkorange"></i>
			    	</span>
				    {!! $errors->first('code') !!}
				</div>

				<div class="form-group">
				    {!! Form::label('active', trans('admin.active')) !!} <br>
				    <label>
				    {!! Form::checkbox('active', null, null, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
				    <span class="text"></span>
				    </label>
				    {!! $errors->first('active') !!}
				</div>			
				{!! Form::button('<i class="fa fa-save"></i> '.trans('scripts.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection