@extends('layouts.app')

@section('content')
	<div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	FAQ Category
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    Back to FAQs
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.faq-categories.edit', $category->id)}}" class="btn btn-warning pull-right">Edit FAQ Category</a>
            <div>
                <label for="question"><strong>Name:</strong></label>
                <p id="question">{{$category->name}}</p>
            </div>
            <div>
                <label for="icon"><strong>Icon:</strong></label>
                <pre id="icon"><i class="fa fa-{{$category->icon}}"></i> </pre>
            </div>
        </div>
    </div>
@endsection