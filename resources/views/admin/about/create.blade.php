@extends('admin/master')

@section('pageTitle')
    {{trans('about.about')}}
@endsection

@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-id-card-o"></i> 
                {{trans('about.about')}}
            </span>
            <a href="{{route('admin.about.show')}}" class="btn btn-default pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('about.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            <div class="widget-body">
                {!! Form::open(array('route' => ['admin.about.store'], 'method' => 'POST', 'role' => 'form', 'files'=> true, 'id'=>'main_form')) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('about.welcome-note')) !!}
                        {!! Form::textarea('welcome_note', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('about.welcome-note'), 'autofocus' => true ]) !!}
                        {!! $errors->first('welcome_note') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('about', trans('about.about')) !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('about', null, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>trans('about.about')]) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('about') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('offer', trans('about.offer')) !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('offer', null, ['id'=>'elm2', 'class' => 'form-control', 'placeholder'=>trans('about.offer')]) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('offer') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('why_us', trans('about.why-us')) !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('why_us', null, ['id'=>'elm3', 'class' => 'form-control', 'placeholder'=>trans('about.why-us')]) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('why_us') !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', trans('about.main-image'))}}
                        
                        {!! Form::file('image', null,['class'=>'form-control']) !!}
                        {!! $errors->first('image') !!}
                    </div>
                    
                        <div class="form-group">
                            {{Form::label('video', trans('about.company-video'))}}
                            <br>
                            
                            {!! Form::text('video', null,['class'=>'form-control']) !!}
                            {!! $errors->first('video') !!}
                        </div> 
                   

                    
                {!! Form::close() !!}
                {!! Form::label('images', trans('about.images')) !!}
                {!! Form::open(array('route' => 'admin.images.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'my-dropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                {!! Form::close() !!}

                {!! Form::button('<i class="fa fa-save"></i> '.trans('about.save'), array('id'=>'submitForm', 'class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;')) !!}
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    @include('scripts/dropzone-config', 
            ['table' => 'about',
         ])
@endsection