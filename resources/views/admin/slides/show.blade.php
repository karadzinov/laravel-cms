@extends('admin/master')

@section('pageTitle')
    {{trans('slides.slides')}}
@endsection

@section('head')
    <style>
        .field{
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
	<div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
            	{{trans('slides.slides')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.slides.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="Back To slides">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('slides.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.slides.edit', $slide->id)}}" class="btn btn-warning pull-right">
                <i class="fa fa-edit"></i> 
                {{trans('slides.edit')}}
            </a>
            @if($slide->top_title)
                <div class="field">
                    <label for="top_title"><strong>{{trans('admin.top-title')}}:</strong></label>
                    <div id="top_title">{!!$slide->top_title!!}</div>
                </div>
            @endif
            <div class="field">
                <label for="title1"><strong>{{trans('admin.title')}}:</strong></label>
                <p id="title1">{{$slide->title}}</p>
            </div>

            @if($slide->subtitle)
                <div class="field">
                    <label for="subtitle1"><strong>{{trans('admin.subtitle')}}:</strong></label>
                    <p id="subtitle1">{{$slide->subtitle}}</p>
                </div>
            @endif

            <div class="field">
                <label for="image"><strong>{{trans('admin.image')}}:</strong></label>
                <br>
                <img src="{{$slide->thumbnailPath}}" alt="{{$slide->image}}" id="image">
            </div>
            <br>
            @if($slide->link)
                <div class="field">
                    <label><strong>{{trans('admin.link')}}:</strong></label>
                    <p>{{$slide->link}}</p>
                </div>
            @endif
            <div class="field">
                <label for="active">{{trans('admin.active')}}:</label>
                <div>
                    @if($slide->active)
                        <span class="label label-success">
                            {{trans('admin.active')}}
                        </span>
                    @else
                        <span class="label label-danger">
                            {{trans('admin.not-active')}}
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <label for="position">
                    <strong>{{trans('admin.position')}}</strong>
                </label>
                <div>
                    {{$slide->position}}
                </div>
            </div>
        </div>
    </div>
@endsection