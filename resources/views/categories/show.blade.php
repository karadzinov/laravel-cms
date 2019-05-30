@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <strong>{!! trans('categories.show-category') !!}</strong>                         
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
                                <img src="/images/categories/thumbnails/{{$category->image}}" alt="">
                            </div>
                        @endif

                    </div>

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