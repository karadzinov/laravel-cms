@extends('layouts.app')

@section('template_title')
   Categories 
@endsection

@section('content')
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">{!! trans('categories.create-category') !!}</span>
            <span class="pull-right">
                <a href='/node/category' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {!! trans('categories.back-to-categories') !!}
                </a>
            </span>
        </div>
        <div class="widget-body">
            <div>
                {!! Form::model($data, [ 'route' => 'category.store' ]) !!}
                    @include('categories.partials.form')
                    {!! Form::button(trans('forms.create_categories_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')

@endsection
