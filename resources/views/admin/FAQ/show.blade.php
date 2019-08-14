@extends('layouts.app')

@section('pageTitle')
    {{trans('faqs.faqs')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	{{trans('faqs.faqs')}}
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {{trans('faqs.back-to')}}
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.faq.edit', $faq->id)}}" class="btn btn-warning pull-right">
                <i class="fa fa-edit"></i> 
                {{trans('faqs.edit')}}
            </a>
            <div>
                <label for="question"><strong>{{trans('admin.question')}}:</strong></label>
                <p id="question">{{$faq->question}}</p>
            </div>
            <div>
                <label for="answer"><strong>{{trans('admin.answer')}}:</strong></label>
                <pre id="answer">{{$faq->answer}}</pre>
            </div>

            <div>
                <label for="category"><strong>{{trans('admin.category')}}:</strong></label>
                <p id="category">{{$faq->category->name}}</p>
            </div>

        </div>
    </div>
@endsection