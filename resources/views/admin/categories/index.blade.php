@extends('layouts.app')

@section('pageTitle')
    {{trans('categories.categories')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-th-list"></i> 
                {!! trans('categories.list-categories') !!}
            </span>
        </div>
        <div class="widget-body">
            <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-lg">
                <i class="fa fa-plus"></i> 
                {!! trans('categories.create-category') !!}
            </a>
            <br>
            <br>
            @include('admin/categories/partials/tree')
        
        </div>
    </div>    
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
