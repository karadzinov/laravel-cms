@extends('layouts.app')

@section('content')
<div class="widget">
    <div class="widget-header bordered-bottom bordered-blue">
        <span class="widget-caption">
            <i class="fa fa-th-list"></i> 
            {!! trans('categories.edit-category') !!}
        </span>
        <a href='/node/category' class="btn btn-light pull-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
            <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
            {!! trans('categories.back-to-categories') !!}
        </a>
        <a href="/node/category/{{$category->id}}/edit" class="btn btn-warning pull-right">
            Edit Script
        </a>
    </div>
    <div class="widget-body">
        <div>
            <label for="tree">Category Tree</label>
            <ul style="list-style-position: outside">
                 <li class="active">{{ $category->name }}</li>
                @include('categories.partials.path')
            </ul>
        </div>
        <div class="row">
            @if($category->description)
                <div class="col-md-8">
                    <label for="description"><strong>Descritpion:</strong></label>
                    <p id="description">{{$category->description}}</p>
                </div>
            @endif
            @if($category->link)
                <div class="col-md-8">
                    <a href="{{$category->link}}" target="_blank">Link</a>
                    <br>
                    <br>
                </div>
            @endif
            @if($category->image)
                <div class="col-md-8">
                    <label for="image"><strong>Image:</strong></label> <br>
                    <img src="/images/categories/{{$category->image}}" alt="">
                </div>
            @endif

        </div>
    </div>
</div>

@include('modals.modal-delete-category')
@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
