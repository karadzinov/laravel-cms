@extends('layouts.app')

@section('head')
    <style>
        .widget-body{
            min-height: 200px;
        }
    </style>
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
            @if ($category)        
                <div class="card-body" style="font-size: 13px">
                    {!! Form::open(array('route' => [ 'admin.category.update', $category->getKey() ], 'method' => 'PATCH', 'role' => 'form', 'files'=> true)) !!}
                    {!! csrf_field() !!}
                        @include('admin/categories/partials/edit-form')
                        <span class="pull-left">    
                            {!! Form::button(trans('categories.update'), array('class' => 'btn btn-success','type' => 'submit' )) !!}
                        </span>                        
                    {!! Form::close() !!}
                </div>
                <div class="card-body" style="font-size: 13px" >
                {!! Form::open(['route' => [ 'admin.category.destroy', $id ], 'method' => 'DELETE' ]) !!}
                        <span class="pull-right"> 
                            {!! Form::button(trans('categories.delete-category'), array('class' => 'btn btn-danger margin-bottom-1 mb-1 float-right','type' => 'button','data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('categories.delete-category'), 'data-message' => trans('categories.confirm-delete'))) !!}
                        </span> 
                    {!! Form::close() !!}                                
                </div>
            @endif
        </div>
    </div>
@include('modals.modal-delete-category')
@endsection

@section('footer_scripts')
    @include('scripts/delete-modal-script')
@endsection