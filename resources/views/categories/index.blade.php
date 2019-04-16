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
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right"> 
                            <a href="{{ route('category.create') }}" class="btn btn-info  margin-bottom-1 mb-1 float-right" title="Create new root category">
                                 {!! trans('categories.create-category') !!} 
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('categories.list-categories') !!}
                        
                        </div>
                    
                        @include('categories.partials.tree')
                    </div>
          
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete-settings')
@endsection

@section('footer_scripts')

    @include('scripts.delete-modal-script')
@endsection