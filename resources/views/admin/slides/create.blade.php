@extends('admin/master')

@section('pageTitle')
    {{trans('slides.slides')}}
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
            {!! Form::open(array('route' => 'admin.slides.store', 'method' => 'POST', 'role' => 'form', 'files'=> true)) !!}

                <div class="form-group">
                    {!! Form::label('top_title', trans('admin.top-title')) !!}
                    {!! Form::text('top_title', null, ['id'=>'top_title', 'class' => 'form-control', 'placeholder'=>trans('admin.top-title'), 'autofocus' => true ]) !!}
                    {!! $errors->first('top_title') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title1', trans('admin.title')) !!}
                    {!! Form::text('title', null, ['id'=>'title1', 'class' => 'form-control', 'placeholder'=>trans('admin.title'), 'autofocus' => true ]) !!}
                    {!! $errors->first('title') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('subtitle1', trans('admin.subtitle')) !!}
                    {!! Form::text('subtitle', null, ['id'=>'subtitle1', 'class' => 'form-control', 'placeholder'=>trans('admin.subtitle'), 'autofocus' => true ]) !!}
                    {!! $errors->first('subtitle') !!}
                </div>

                <div class="form-group">
                    {{Form::label('image', trans('admin.image') . ' (1200x800px)')}}
                    {!! Form::file('image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('link', trans('admin.link')) !!}
                    {!! Form::text('link', null, ['id'=>'link', 'class' => 'form-control', 'placeholder'=>trans('admin.link'), 'autofocus' => true ]) !!}
                    {!! $errors->first('link') !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('active', trans('admin.active')) !!} <br>
                    <label>
                    {!! Form::checkbox('active', null, 1, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
                    <span class="text"></span>
                    </label>
                    {!! $errors->first('active') !!}
                </div>

                {!! Form::button('<i class="fa fa-save"></i> '.trans('slides.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection