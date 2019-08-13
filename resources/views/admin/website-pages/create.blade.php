@extends('layouts.app')
@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-newspaper-o"></i> 
                {{trans('pages.pages')}}
            </span>
            <a href="{{route('admin.pages.index')}}" class="btn btn-default pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('pages.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            <div class="widget-body">
                {!! Form::open(array('route' => 'admin.pages.store', 'method' => 'POST', 'role' => 'form', 'files'=> true, 'id'=>'main_form')) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('admin.title')) !!}
                        {!! Form::textarea('title', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.title'), 'autofocus' => true ]) !!}
                        {!! $errors->first('title') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('code', trans('admin.subtitle')) !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('subtitle', null, ['id'=>'subtitle', 'class' => 'form-control', 'placeholder'=>trans('admin.subtitle')]) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('subtitle') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('main_text', trans('admin.main-text')) !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('main_text', null, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>trans('admin.main-text')]) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('main_text') !!}
                    </div>
                    
                {!! Form::close() !!}
                {!! Form::label('images', trans('admin.images')) !!}
                {!! Form::open(array('route' => 'admin.images.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'my-dropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                {!! Form::close() !!}

                {!! Form::button(trans('pages.save'), array('id'=>'submitForm', 'class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;')) !!}
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    @include('scripts/dropzone-config', 
            ['table'=>'pages'])
@endsection