@extends('admin/master')

@section('pageTitle')
    {{trans('partners.partners')}}
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
            {!! Form::open(array('route' => 'admin.partners.store', 'method' => 'POST', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control', 'placeholder'=>trans('admin.name'), 'autofocus' => true ]) !!}
                    {!! $errors->first('name') !!}
                </div>

                <div class="form-group">
                    {{Form::label('image', trans('admin.image') . ' (137x77px)')}}
                    {!! Form::file('image', null,['class'=>'form-control']) !!}
                    {!! $errors->first('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('link', trans('admin.link')) !!}
                    {!! Form::text('link', null, ['id'=>'link', 'class' => 'form-control', 'placeholder'=>trans('admin.link')]) !!}
                    {!! $errors->first('link') !!}
                </div>

                {!! Form::button('<i class="fa fa-save"></i> '.trans('partners.save'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection