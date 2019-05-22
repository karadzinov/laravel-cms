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
                            {!! trans('categories.show-category') !!}                         
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
                    <div class="card-body">
                        <ul style="list-style-position: outside">
                         <li class="active">{{ $category->name }}</li>
                        @include('categories.partials.path')
                    </ul>
                    </div>
  
            </div>
        </div>
    </div>
</div>

@include('modals.modal-delete-category')
@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
