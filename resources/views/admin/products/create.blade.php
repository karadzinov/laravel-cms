@extends('admin/master')

@section('pageTitle')
    {{trans('products.products')}}
@endsection

@section('head')
    <style>
        select{
            width:100%;
        }
    </style>
    <script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>

@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-pencil"></i> 
                {{trans('products.products')}}
            </span>
            <a href="{{route('admin.products.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('products.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => 'admin.products.store', 'id'=>'main_form', 'method' => 'POST', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::textarea('name', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.name'), 'autofocus' => true ]) !!}
                    {!! $errors->first('name') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('short_description', trans('admin.short-description')) !!}
                    {!! Form::textarea('short_description', null, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.short-description'), 'autofocus' => true ]) !!}
                    {!! $errors->first('short_description') !!}
                </div>

                <div class="form-group">
                    {{Form::label('main_image', trans('admin.image'))}}
                    {!! Form::file('main_image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('main_image') !!}
                </div>

                <div class="form-group">
                    {{Form::label('video', trans('admin.video'))}}
                    <span class="input-icon icon-right">
                        {!! Form::text('video', null,['class'=>'form-control', 'placeholder'=> 'https://youtube...']) !!}
                        <i class="fa fa-play"></i>
                    </span>
                    {!! $errors->first('video') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('admin.description')) !!}
                     <span class="input-icon icon-right">
                        {!! Form::textarea('description', null, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>trans('admin.main-text')]) !!}
                        <i class="fa fa-pencil darkorange"></i>
                    </span>
                    {!! $errors->first('description') !!}
                </div>

               <div class="form-group">
                   {!! Form::label('category', trans('admin.category') , array('class' => 'control-label')); !!}
                   {{Form::select('category_id', 
                       $categories,
                       array('class'=>'form-control'))}}
               </div>

                <div class="form-group">
                    {{Form::label('price', trans('admin.price'))}}
                    <span class="input-icon icon-right">
                        {!! Form::number('price', null,['class'=>'form-control', 'placeholder'=> $currency]) !!}
                        <i class="fa fa-money"></i>
                    </span>
                    {!! $errors->first('price') !!}
                </div>

                <div class="form-group">
                    {{Form::label('reduction', trans('admin.reduction'))}}
                    <span class="input-icon icon-right">
                        {!! Form::number('reduction', null,['class'=>'form-control', 'placeholder'=> trans('admin.no-reduction')]) !!}
                        <i class="fa fa-percent"></i>
                    </span>
                    {!! $errors->first('reduction') !!}
                </div>

                <div class="form-group">
                    {{Form::label('quantity', trans('admin.quantity'))}}
                    <span class="input-icon icon-right">
                        {!! Form::number('quantity', null,['class'=>'form-control', 'placeholder'=> trans('admin.unlimited')]) !!}
                        <i class="fa fa-cubes"></i>
                    </span>
                    {!! $errors->first('quantity') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('active', trans('admin.active')) !!} <br>
                    <label>
                    {!! Form::checkbox('active', null, 1, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
                    <span class="text"></span>
                    </label>
                    {!! $errors->first('active') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('delivery', trans('admin.delivery')) !!} <br>
                    <label>
                    {!! Form::checkbox('delivery', null, 0, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
                    <span class="text"></span>
                    </label>
                    {!! $errors->first('delivery') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tags', trans('admin.tags') , array('class' => 'control-label')); !!}
                    {{Form::select('tags[]', 
                        $tags, null,
                        array('id'=>'tags', 'class'=>'form-control', 'multiple'=>'multiple'))}}
                </div> 
                {!! Form::close() !!}
                {!! Form::label('images', trans('admin.images')) !!}
                {!! Form::open(array('route' => 'admin.images.store', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'my-dropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                {!! Form::close() !!}

                {!! Form::button('<i class="fa fa-save"></i> '.trans('pages.save'), array('id'=>'submitForm', 'class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;')) !!}
                {{-- {!! Form::button('<i class="fa fa-save"></i> '.trans('products.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!} --}}
            {{-- {!! Form::close() !!} --}}
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script>
        $("#category").select2();
        $("#tags").select2({
            placeholder: '{{trans('posts.add-tags')}}',
            tags: true
        });
    </script>
    @include('scripts/dropzone-config', 
                ['table'=>'products'])
@endsection