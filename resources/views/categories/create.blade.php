@extends('layouts.app')

@section('template_title')
   Categories 
@endsection
@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
@endsection
@section('head')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('categories.create-category') !!}
                        </div>
                        <div class="pull-right"> 
                            <table class="table-sm">
                                <tr>
                                    <td>
                                        <a href='/node/category' class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                                        <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                        {!! trans('categories.back-to-categories') !!}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-body" style="font-size: 13px">
                    {!! Form::model($data, [ 'route' => 'category.store' ]) !!}
                        @include('categories.partials.form')
                        {!! Form::button(trans('forms.create_categories_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('footer_scripts')

@endsection
