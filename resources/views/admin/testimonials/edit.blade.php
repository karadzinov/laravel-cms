@extends('layouts.app')
@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
                Testimonials
            </span>
            <a href="{{route('admin.testimonials.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                Back To Testimonials
            </a>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.testimonials.update', $testimonial->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Title:') !!}
                    {!! Form::textarea('title', $testimonial->title, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>'Title', 'autofocus' => true ]) !!}
                    {!! $errors->first('title') !!}
                </div>

                <div class="form-group">
                    {{Form::label('image', 'Image:')}}
                    {!! Form::file('image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::textarea('name', $testimonial->name, ['id'=>'name', 'class' => 'form-control', 'placeholder'=>'Name', 'autofocus' => true ]) !!}
                    {!! $errors->first('name') !!}
                </div>   

                <div class="form-group">
                    {!! Form::label('content', 'Content:') !!}
                     <span class="input-icon icon-right">
                        {!! Form::textarea('content', $testimonial->content, ['id'=>'content', 'class' => 'form-control', 'placeholder'=>'Content']) !!}
                        <i class="fa fa-pencil darkorange"></i>
                    </span>
                    {!! $errors->first('content') !!}
                </div>

                {!! Form::button('Edit Testimonial', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection