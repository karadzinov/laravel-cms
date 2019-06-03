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
                {!! Form::open(array('route' => 'pages.store', 'method' => 'POST', 'role' => 'form', 'files'=> true, 'id'=>'main_form')) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Title:') !!}
                        {!! Form::textarea('title', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>'Title', 'autofocus' => true ]) !!}
                        {!! $errors->first('title') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('code', 'Subtitle:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('subtitle', null, ['id'=>'subtitle', 'class' => 'form-control', 'placeholder'=>'Subtitle']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('subtitle') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('main_text', 'Main Text:') !!}
                         <span class="input-icon icon-right">
                            {!! Form::textarea('main_text', null, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>'Main Text']) !!}
                            <i class="fa fa-pencil darkorange"></i>
                        </span>
                        {!! $errors->first('main_text') !!}
                    </div>
                    {!! Form::label('images', 'Images:') !!}
                    
                    {{-- <div class="dropzone" id="myDropzone"></div> --}}

                {!! Form::close() !!}
                {!! Form::open(array('route' => 'images.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'my-dropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                {!! Form::close() !!}

                {!! Form::button('Create Script', array('id'=>'submitForm', 'class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;')) !!}
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{{ config('settings.dropZoneJsCDN') }}}"></script>
    <script>
        $('#submitForm').on('click', function(){
            $('#main_form').submit();
        })
    </script>
    <script>
        Dropzone.options.myDropzone= {
            url: '{{route('images.store')}}',
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 1,
            // maxFiles: 5,
            maxFilesize: 1, //mb
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            init: function() {
                dzClosure = this;
                
                this.on("sending", function(data, xhr, formData) {
                    formData.append("_token", '{{csrf_field()}}');
                    formData.append("model", 'pages');
                });
            },

            removedfile: function(file) {
            $.ajaxSetup({
                        headers:
                        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });
            $.ajax({
                type: 'POST',
                url: '{{route('images.delete')}}',
                data: {
                    name: file.name,
                    model: 'pages',
                    },
                success: function(response){
                    console.log('Image successfully deleted.')
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                error: function(response){
                    console.log('Error while deleting image.')
                }
           });
          }
        }
    </script>
@endsection