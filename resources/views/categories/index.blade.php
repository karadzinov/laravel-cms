@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-th-list"></i> 
                {!! trans('categories.list-categories') !!}
            </span>
        </div>
        <div class="widget-body">
            <a href="{{ route('category.create') }}" class="btn btn-success btn-lg">
                {!! trans('categories.create-category') !!}
            </a>
            <br>
            <br>
            @include('categories.partials.tree')
        
        </div>
    </div>    
    @include('modals.modal-delete-settings')
    
@endsection

@section('footer_scripts')

    @include('scripts.delete-modal-script')
@endsection
