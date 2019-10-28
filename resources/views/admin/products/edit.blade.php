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
            {!! Form::open(array('route' => ['admin.products.update', $product->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
            @method('PUT')
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::textarea('name', $product->name, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.name'), 'autofocus' => true ]) !!}
                    {!! $errors->first('name') !!}
                </div>

                @if($product->main_image)
                    <div>
                        <img src="{{$product->thumbnailPath}}">
                        <br>
                        <br>
                    </div>
                @endif
                <div class="form-group">
                    {{Form::label('image', trans('admin.image'))}}
                    {!! Form::file('main_image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('main_image') !!}
                </div> 

                <div class="form-group">
                    {{Form::label('video', trans('admin.video'))}} <br>
                    <a href="{{$product->video}}" target="_blank">
                        <img src="{{$product->videoPreviewImage}}" alt="">
                    </a>
                    <br>
                    <br>
                    <span class="input-icon icon-right">
                        {!! Form::text('video', $product->video,['class'=>'form-control']) !!}
                        <i class="fa fa-play"></i>
                    </span>
                    {!! $errors->first('video') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('admin.description')) !!}
                     <span class="input-icon icon-right">
                        {!! Form::textarea('description', $product->description, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>trans('admin.main-text')]) !!}
                        <i class="fa fa-pencil darkorange"></i>
                    </span>
                    {!! $errors->first('description') !!}
                </div>

               <div class="form-group">
                   {!! Form::label('category', trans('admin.category') , array('class' => 'control-label')); !!}
                   {{Form::select('category_id', 
                       $categories, $product->category->id,
                       array('class'=>'form-control'))}}
               </div>

                <div class="form-group">
                    {{Form::label('price', trans('admin.price'))}}
                    <span class="input-icon icon-right">
                        {!! Form::number('price', $product->price,['class'=>'form-control', 'placeholder'=> $currency]) !!}
                        <i class="fa fa-money"></i>
                    </span>
                    {!! $errors->first('price') !!}
                </div>

                <div class="form-group">
                    {{Form::label('reduction', trans('admin.reduction'))}}
                    <span class="input-icon icon-right">
                        {!! Form::number('reduction', $product->reduction,['class'=>'form-control', 'placeholder'=> trans('admin.no-reduction')]) !!}
                        <i class="fa fa-percent"></i>
                    </span>
                    {!! $errors->first('reduction') !!}
                </div>

                <div class="form-group">
                    {{Form::label('quantity', trans('admin.quantity'))}}
                    <span class="input-icon icon-right">
                        {!! Form::number('quantity', $product->quantity,['class'=>'form-control', 'placeholder'=> trans('admin.unlimited')]) !!}
                        <i class="fa fa-cubes"></i>
                    </span>
                    {!! $errors->first('quantity') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('active', trans('admin.active')) !!} <br>
                    <label>
                    {!! Form::checkbox('active', null, $product->active, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
                    <span class="text"></span>
                    </label>
                    {!! $errors->first('active') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('delivery', trans('admin.delivery')) !!} <br>
                    <label>
                    {!! Form::checkbox('delivery', null, $product->delivery, [ 'class' => 'checkbox-slider slider-icon colored-palegreen']) !!}
                    <span class="text"></span>
                    </label>
                    {!! $errors->first('delivery') !!}
                </div>   

                {!! Form::button('<i class="fa fa-save"></i> '.trans('products.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script>
        $("#category").select2();
    </script>
@endsection