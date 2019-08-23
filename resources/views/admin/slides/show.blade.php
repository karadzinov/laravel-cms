@extends('admin/master')

@section('pageTitle')
    {{trans('slides.slides')}}
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
            <div>
                <label for="title"><strong>{{trans('admin.title')}}:</strong></label>
                <p id="title">{{$slide->title}}</p>
            </div>

            <div>
                <label for="subtitle"><strong>{{trans('admin.subtitle')}}:</strong></label>
                <p id="subtitle">{{$slide->subtitle}}</p>
            </div>

            <div>
                <label for="image"><strong>{{trans('admin.image')}}:</strong></label>
                <br>
                <img src="{{$slide->thumbnailPath}}" alt="{{$slide->image}}" id="image">
            </div>
            <br>
            <div>
                <label for="video"><strong>{{trans('admin.video')}}:</strong></label>
                <div id="video">{!!$slide->videoPreview!!}</div>
            </div>
            <div>
                <label><strong>{{trans('admin.link')}}:</strong></label>
                <p>{{$slide->link}}</p>
            </div>
            <div>
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
        </div>
    </div>
@endsection