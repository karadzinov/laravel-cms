@extends('layouts.app')

@section('pageTitle')
    {{trans('faq-categories.faq-categories')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	{{trans('faq-categories.edit')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq-categories.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('faq-categories.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.faq-categories.update', $category->id], 'method' => 'PUT')) !!}
                {!! csrf_field() !!}
            <div>
                {!! Form::label('name', trans('admin.name')) !!}:
                {!! Form::text('name', $category->name, [ 'class' => 'form-control', 'placeholder'=>trans('admin.name'), 'autofocus' => true ]) !!}
	        {!! $errors->first('name') !!}
            </div>
            <br>
            <div class="form-group">
                {!! Form::label('icon', trans('admin.icon')) !!}: 
                {!!trans('faq-categories.explination', ['link'=>'https://fontawesome.com/v4.7.0/icons/'])!!}
                 <span class="input-icon icon-right">
                    {!! Form::text('icon', $category->icon, [ 'class' => 'form-control', 'placeholder'=>'Icon']) !!}
                    <i class="fa fa-{{$category->icon}}"></i>
                </span>
                {!! $errors->first('icon') !!}
            </div>
            {!! Form::button('<i class="fa fa-save"></i> '.trans('faq-categories.update'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
   
            {!! Form::close() !!}    
        </div>
    </div>
@endsection