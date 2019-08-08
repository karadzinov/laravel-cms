@extends('layouts.app')

@section('content')
	<div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
            	Testimonial
            </span>
            <span class="pull-right">
                <a href='{{route('admin.testimonials.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="Back To Testimonials">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    Back to Testimonials
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.testimonials.edit', $testimonial->id)}}" class="btn btn-warning pull-right">Edit Testimonial</a>
            <div>
                <label><strong>Title:</strong></label>
                <p>{{$testimonial->title}}</p>
            </div>

            <div>
                <label for="image"><strong>Image:</strong></label>
                <br>
                <img src="{{$testimonial->thumbnailPath}}" alt="{{$testimonial->image}}" id="image">
            </div>
            <br>

            <div>
                <label for="name"><strong>Name:</strong></label>
                <p id="name">{{$testimonial->name}}</p>
            </div>

            @if($testimonial->company)
                <div>
                    <label for="company"><strong>Comapny:</strong></label>
                    <p id="company">{{$testimonial->company}}</p>
                </div>
            @endif

            <div>
                <label for="content"><strong>Content:</strong></label>
                <pre id="content"><code>{!!$testimonial->content!!}</code></pre>
            </div>
            
        </div>
    </div>
@endsection