@extends('admin/master')

@section('pageTitle')
    {{trans('slides.slides')}}
@endsection

@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
                {{trans('slides.slides')}}
            </span>
            <a href="{{route('admin.slides.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('slides.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.slides.update', $slide->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('title1', trans('admin.title')) !!}
                    {!! Form::text('title', $slide->title, ['id'=>'title1', 'class' => 'form-control', 'placeholder'=>trans('admin.title')]) !!}
                    {!! $errors->first('title') !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('subtitle1', trans('admin.subtitle')) !!}
                    {!! Form::text('subtitle', $slide->subtitle, ['id'=>'subtitle1', 'class' => 'form-control', 'placeholder'=>trans('admin.subtitle')]) !!}
                    {!! $errors->first('subtitle') !!}
                </div> 

                @if($slide->image)
                    <div>
                        <img src="{{$slide->thumbnailPath}}">
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
                    {!! Form::label('video', trans('admin.video')) !!}
                    {!! Form::text('video', $slide->video, ['id'=>'video', 'class' => 'form-control', 'placeholder'=>trans('admin.video')]) !!}
                    {!! $errors->first('video') !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('link', trans('admin.link')) !!}
                    {!! Form::text('link', $slide->link, ['id'=>'link', 'class' => 'form-control', 'placeholder'=>trans('admin.link')]) !!}
                    {!! $errors->first('link') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('active',  trans('admin.active')) !!} <br>
                    <label>
                    {!! Form::checkbox('active', null, $slide->active, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
                    <span class="text"></span>
                    </label>
                    {!! $errors->first('active') !!}
                </div>  

                {!! Form::button('<i class="fa fa-save"></i> '.trans('slides.update'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection