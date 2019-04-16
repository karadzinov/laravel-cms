@extends('layouts.app')

@section('template_title')
 Categories
@endsection

@section('head')
@endsection
@section('template_linked_css')
    
@endsection
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-12 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('categories.edit-category') !!}  {{$category->name }} 
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
                    </div>
                    @if ($category)        
                        <div class="card-body" style="font-size: 13px">
                            {!! Form::model($category, [ 'route' => [ 'category.update', $category->getKey() ], 'method' => 'PATCH' ]) !!}
                                @include('categories.partials.form')
                                <span class="pull-right">    
                                    {!! Form::button(trans('forms.edit_categories_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
                                </span>                        
                            {!! Form::close() !!}
                        </div>
                        <div class="card-body" style="font-size: 13px" >
                        {!! Form::open(['route' => [ 'category.destroy', $id ], 'method' => 'DELETE' ]) !!}
                                <span class="pull-right"> 
                                    {!! Form::button(trans('categories.delete-category'), array('class' => 'btn btn-danger margin-bottom-1 mb-1 float-right','type' => 'button', 'style' =>'width: 100%; margin-top: -25px; ' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Categories', 'data-message' => 'You want to delete Category. Are you sure? ')) !!}
                                </span> 
                            {!! Form::close() !!}                                
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>

@include('modals.modal-delete-category')
@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
