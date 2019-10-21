@extends('admin/master')

@section('pageTitle')
    {{trans('testimonials.testimonials')}}
@endsection

@section('head')
    <script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>
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
            {!! Form::open(array('route' => 'admin.testimonials.store', 'method' => 'POST', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('title', trans('admin.title')) !!}
                    {!! Form::textarea('title', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.title'), 'autofocus' => true ]) !!}
                    {!! $errors->first('title') !!}
                </div>

                <div class="form-group">
                    {{Form::label('image', trans('admin.image'))}}
                    {!! Form::file('image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'placeholder'=>trans('admin.name')]) !!}
                    {!! $errors->first('name') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('company', trans('admin.company')) !!}
                    {!! Form::text('company', null, ['id'=>'company', 'class' => 'form-control', 'placeholder'=>trans('admin.company')]) !!}
                    {!! $errors->first('company') !!}
                </div>   

                <div class="form-group">
                    {!! Form::label('#elm2', trans('admin.content')) !!}
                    {!! Form::textarea('content', null, ['id'=>'elm2', 'class' => 'form-control', 'placeholder'=>trans('admin.content')]) !!}
                    {!! $errors->first('content') !!}
                </div>

                {!! Form::button('<i class="fa fa-save"></i> '.trans('testimonials.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection