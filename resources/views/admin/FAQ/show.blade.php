@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
            	FAQ
            </span>
            <span class="pull-right">
                <a href='{{route('admin.faq.index')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('categories.back-to-categories') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    Back to FAQs
                </a>
            </span>
        </div>
        <div class="widget-body">
            <a href="{{route('admin.faq.edit', $faq->id)}}" class="btn btn-warning pull-right">Edit FAQ</a>
            <div>
                <label for="question"><strong>Question:</strong></label>
                <p id="question">{{$faq->question}}</p>
            </div>
            <div>
                <label for="answer"><strong>Answer:</strong></label>
                <pre id="code">{{$faq->answer}}</pre>
            </div>

            <div>
                <label for="category"><strong>Category:</strong></label>
                <p id="category">{{$faq->category->name}}</p>
            </div>

        </div>
    </div>
@endsection