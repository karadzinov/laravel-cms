@extends('layouts.app')
@section('head')
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-id-card-o"></i> 
                About Page
            </span>
            <a href="{{route('admin.about.show')}}" class="btn btn-default pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                Back To About
            </a>
        </div>
        <div class="widget-body">
            <div class="widget-body">
                {!! Form::open(array('route' => ['admin.about.update'], 'method' => 'PUT', 'role' => 'form', 'files'=> true, 'id'=>'main_form')) !!}
                    {!!Form::hidden('id', $about->id)!!}
                    <div class="form-group">
                        {!! Form::label('name', 'Welcome Note:') !!}
                        {!! Form::textarea('welcome_note', $about->welcome_note, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>'Welcome Note', 'autofocus' => true ]) !!}
                        {!! $errors->first('welcome_note') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('about', 'About:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('about', $about->about, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>'About']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('about') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('offer', 'Our Offer:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('offer', $about->offer, ['id'=>'elm2', 'class' => 'form-control', 'placeholder'=>'Our Offer']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('offer') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('why_us', 'Why Us:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('why_us', $about->why_us, ['id'=>'elm3', 'class' => 'form-control', 'placeholder'=>'Why Us']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('why_us') !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', 'Main Image:')}}
                        <div>
                            <img src="{{$about->thumbnailPath . $about->image}}">
                        </div><br>
                        
                        {!! Form::file('image', null,['class'=>'form-control']) !!}
                        {!! $errors->first('image') !!}
                    </div>
                    @if($about->video)
                        <div class="form-group">
                            {{Form::label('video', 'Company Video:')}}
                            <br>
                            {!!$about->videoPreview!!}
                            {!! Form::text('video', $about->video,['class'=>'form-control']) !!}
                            {!! $errors->first('video') !!}
                        </div> 
                    @endif

                    
                {!! Form::close() !!}
                {!! Form::label('images', 'Images:') !!}
                {!! Form::open(array('route' => 'admin.images.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'my-dropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                {!! Form::close() !!}

                {!! Form::button('Edit About Page', array('id'=>'submitForm', 'class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;')) !!}
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    @include('scripts/dropzone-config', 
            ['table' => $about->getTable(),
             'model'=>$about
         ])
@endsection