@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	Edit FAQ Category
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq-categories.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    Back to FAQ Categories
                </a>
            </span>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.faq-categories.update', $category->id], 'method' => 'PUT')) !!}
                {!! csrf_field() !!}
            <div>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $category->name, [ 'class' => 'form-control', 'placeholder'=>'Name', 'autofocus' => true ]) !!}
	        {!! $errors->first('name') !!}
            </div>
            <div class="form-group">
                {!! Form::label('icon', 'Answer:') !!}
                 <span class="input-icon icon-right">
                    {!! Form::text('icon', $category->icon, [ 'class' => 'form-control', 'placeholder'=>'Icon']) !!}
                    <i class="fa fa-{{$category->icon}}"></i>
                </span>
                {!! $errors->first('icon') !!}
            </div>
            {!! Form::button('Edit FAQ Category', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
   
            {!! Form::close() !!}    
        </div>
    </div>
@endsection