@extends('admin/master')

@section('pageTitle')
    {{trans('partners.partners')}}
@endsection

@section('content')
	<div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
            	{{trans('partners.partners')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.partners.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="Back To partners">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('partners.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.partners.edit', $partner->id)}}" class="btn btn-warning pull-right">
                <i class="fa fa-edit"></i> 
                {{trans('partners.edit')}}
            </a>
            <div>
                <label for="name"><strong>{{trans('admin.name')}}:</strong></label>
                <p id="name">{{$partner->name}}</p>
            </div>

            <div>
                <label for="image"><strong>{{trans('admin.image')}}:</strong></label>
                <br>
                <img src="{{$partner->thumbnailPath}}" alt="{{$partner->image}}" id="image">
            </div>
            <br>
            <div>
                <label><strong>{{trans('admin.link')}}:</strong></label>
                <p>{{$partner->link}}</p>
            </div>
        </div>
    </div>
@endsection