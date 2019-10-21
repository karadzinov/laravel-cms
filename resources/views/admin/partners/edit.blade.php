@extends('admin/master')

@section('pageTitle')
    {{trans('partners.partners')}}
@endsection

@section('head')
    <script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-comments"></i> 
                {{trans('partners.partners')}}
            </span>
            <a href="{{route('admin.partners.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('partners.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.partners.update', $partner->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', $partner->name, ['id'=>'name', 'class' => 'form-control', 'placeholder'=>trans('admin.name')]) !!}
                    {!! $errors->first('name') !!}
                </div> 
                @if($partner->image)
                    <div>
                        <img src="{{$partner->thumbnailPath}}">
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
                    {!! Form::label('link', trans('admin.link')) !!}
                    {!! Form::text('link', $partner->link, ['id'=>'link', 'class' => 'form-control', 'placeholder'=>trans('admin.link')]) !!}
                    {!! $errors->first('link') !!}
                </div> 

                {!! Form::button('<i class="fa fa-save"></i> '.trans('partners.update'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection