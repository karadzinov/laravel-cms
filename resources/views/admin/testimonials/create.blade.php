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
            {!! Form::open(array('route' => 'admin.testimonials.store', 'method' => 'POST', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::textarea('title', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>'Title', 'autofocus' => true ]) !!}
                    {!! $errors->first('title') !!}
                </div>

                <div class="form-group">
                    {{Form::label('image', 'Image:')}}
                    {!! Form::file('image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'placeholder'=>'Name', 'autofocus' => true ]) !!}
                    {!! $errors->first('name') !!}
                </div>   

                <div class="form-group">
                    {!! Form::label('#elm2', 'Content:') !!}
                    {!! Form::textarea('content', null, ['id'=>'elm2', 'class' => 'form-control', 'placeholder'=>'Content']) !!}
                    {!! $errors->first('content') !!}
                </div>

                {!! Form::button('Create Testimonial', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection