@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	Edit FAQ
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    Back to FAQs
                </a>
            </span>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.faq.update', $faq->id], 'method' => 'PUT')) !!}
                {!! csrf_field() !!}
            <div>
                {!! Form::label('question', 'Question:') !!}
                {!! Form::text('question', $faq->question, [ 'class' => 'form-control', 'placeholder'=>'Question', 'autofocus' => true ]) !!}
	        {!! $errors->first('name') !!}
            </div>
            <div class="form-group">
                {!! Form::label('answer', 'Answer:') !!}
                 <span class="input-icon icon-right">
                    {!! Form::textarea('answer', $faq->answer, [ 'class' => 'form-control', 'placeholder'=>'Answer']) !!}
                </span>
                {!! $errors->first('code') !!}
            </div>
            {!! Form::button('Edit FAQ', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
   
            {!! Form::close() !!}    
        </div>
    </div>
@endsection