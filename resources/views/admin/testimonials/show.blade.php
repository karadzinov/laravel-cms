@extends('layouts.app')
@section('pageTitle')
    {{trans('testimonials.testimonials')}}
@endsection
@section('content')
	<div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
            	{{trans('testimonials.testimonials')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.testimonials.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="Back To Testimonials">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('testimonials.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.testimonials.edit', $testimonial->id)}}" class="btn btn-warning pull-right">{{trans('testimonials.edit')}}</a>
            <div>
                <label><strong>{{trans('admin.title')}}:</strong></label>
                <p>{{$testimonial->title}}</p>
            </div>

            <div>
                <label for="image"><strong>{{trans('admin.image')}}:</strong></label>
                <br>
                <img src="{{$testimonial->thumbnailPath}}" alt="{{$testimonial->image}}" id="image">
            </div>
            <br>

            <div>
                <label for="name"><strong>{{trans('admin.name')}}:</strong></label>
                <p id="name">{{$testimonial->name}}</p>
            </div>

            @if($testimonial->company)
                <div>
                    <label for="company"><strong>{{trans('admin.company')}}:</strong></label>
                    <p id="company">{{$testimonial->company}}</p>
                </div>
            @endif

            <div>
                <label for="content"><strong>{{trans('admin.content')}}:</strong></label>
                <pre id="content"><code>{!!$testimonial->content!!}</code></pre>
            </div>
            
        </div>
    </div>
@endsection