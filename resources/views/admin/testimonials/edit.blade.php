@extends('layouts.app')
@section('pageTitle')
    {{trans('testimonials.testimonials')}}
@endsection
@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
                {{trans('testimonials.testimonials')}}
            </span>
            <a href="{{route('admin.testimonials.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('testimonials.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.testimonials.update', $testimonial->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.title')) !!}
                    {!! Form::textarea('title', $testimonial->title, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.title'), 'autofocus' => true ]) !!}
                    {!! $errors->first('title') !!}
                </div>
                @if($testimonial->image)
                    <div>
                        <img src="{{$testimonial->thumbnailPath}}">
                        <br>
                        <br>
                    </div>
                @endif
                <div class="form-group">
                    {{Form::label('image', trans('admin.image'))}}
                    {!! Form::file('image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('image') !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', $testimonial->name, ['id'=>'name', 'class' => 'form-control', 'placeholder'=>trans('admin.name')]) !!}
                    {!! $errors->first('name') !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('company', trans('admin.company')) !!}
                    {!! Form::text('company', $testimonial->company, ['id'=>'company', 'class' => 'form-control', 'placeholder'=>trans('admin.company')]) !!}
                    {!! $errors->first('company') !!}
                </div>   

                <div class="form-group">
                    {!! Form::label('content', trans('admin.content')) !!}
                     <span class="input-icon icon-right">
                        {!! Form::textarea('content', $testimonial->content, ['id'=>'content', 'class' => 'form-control', 'placeholder'=>trans('admin.content')]) !!}
                        <i class="fa fa-pencil darkorange"></i>
                    </span>
                    {!! $errors->first('content') !!}
                </div>

                {!! Form::button(trans('testimonials.update'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection