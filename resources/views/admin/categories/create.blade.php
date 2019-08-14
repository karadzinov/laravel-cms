@extends('layouts.app')

@section('pageTitle')
    {{trans('categories.categories')}}
@endsection

@section('content')
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-th-list"></i>
                {!! trans('categories.categories') !!}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.category.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {!! trans('categories.back-to-categories') !!}
                </a>
            </span>
        </div>
        <div class="widget-body">
            <div>
                {!! Form::open(array('route' => 'admin.category.store', 'method' => 'POST', 'role' => 'form', 'files'=> true)) !!}
                {!! csrf_field() !!}
                    @include('admin/categories/partials/create-form')
                    {!! Form::button('<i class="fa fa-save"></i> '.trans('categories.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection