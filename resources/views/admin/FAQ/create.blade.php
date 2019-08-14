@extends('layouts.app')

@section('pageTitle')
    {{trans('faqs.faqs')}}
@endsection

@section('content')
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	{{trans('faqs.faqs')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('faqs.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => 'admin.faq.store', 'method' => 'POST')) !!}
                {!! csrf_field() !!}
                    <div class="form-group">
                        {!! Form::label('question', trans('admin.question')) !!}
                        {!! Form::text('question', null, [ 'class' => 'form-control', 'placeholder'=>trans('admin.question'), 'autofocus' => true ]) !!}
                        {!! $errors->first('question') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('answer', trans('admin.answer')) !!}
                         <span class="input-icon icon-right">
                                {!! Form::textarea('answer', null, [ 'class' => 'form-control', 'placeholder'=>trans('admin.answer')]) !!}
                                <i class="fa fa-code darkorange"></i>
                        </span>
                        {!! $errors->first('answer') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', trans('admin.category')); !!}
                        {{Form::select('category_id', 
                            $categories, null,
                            array('class' => 'form-control', 'id'=>'category_id'))}}
                        {!! $errors->first('category_id') !!}
                    </div>

                    {!! Form::button('<i class="fa fa-save"></i> '.trans('faqs.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection