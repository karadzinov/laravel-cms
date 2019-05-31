@extends('layouts.app')
@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-newspaper-o"></i> 
                Pages
            </span>
        </div>
        <div class="widget-body">
            <div class="widget-body">
                {!! Form::open(array('route' => ['pages.update', $page->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Title:') !!}
                        {!! Form::textarea('title', $page->title, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>'Title', 'autofocus' => true ]) !!}
                        {!! $errors->first('title') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('code', 'Subtitle:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('subtitle', $page->subtitle, ['id'=>'subtitle', 'class' => 'form-control', 'placeholder'=>'Subtitle']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('subtitle') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('main_text', 'Main Text:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('main_text', $page->main_text, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>'Main Text']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('main_text') !!}
                    </div>
                    
                    {!! Form::button('Edit Script', array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection