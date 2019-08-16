@extends('admin/master')

@section('pageTitle')
    {{trans('posts.posts')}}
@endsection

@section('head')
    <style>
        select{
            width:100%;
        }
    </style>
    <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-pencil"></i> 
                {!!$post->title!!}
            </span>
            <a href="{{route('admin.posts.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('posts.back-to')}}
            </a>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => ['admin.posts.update', $post->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true)) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.title')) !!}
                    {!! Form::textarea('title', $post->title, ['id'=>'title', 'class' => 'form-control', 'placeholder'=>trans('admin.title'), 'autofocus' => true ]) !!}
                    {!! $errors->first('title') !!}
                </div>
                {!! Form::hidden('id', $post->id) !!}
                
                <div class="form-group">
                    {!! Form::label('code', trans('admin.subtitle')) !!}
                     <span class="input-icon icon-right">
                        {!! Form::textarea('subtitle', $post->subtitle, ['id'=>'subtitle', 'class' => 'form-control', 'placeholder'=>trans('admin.subtitle')]) !!}
                        <i class="fa fa-pencil darkorange"></i>
                    </span>
                    {!! $errors->first('subtitle') !!}
                </div>

                @if($post->image)
                    <div>
                        <img src="{{$post->thumbnailPath}}">
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
                    {{Form::label('video', trans('admin.video'))}} <br>
                    <a href="{{$post->video}}" target="_blank">
                        <img src="{{$post->videoPreviewImage}}" alt="">
                    </a>
                    <br>
                    <br>
                    <span class="input-icon icon-right">
                        {!! Form::text('video', $post->video,['class'=>'form-control']) !!}
                        <i class="fa fa-play"></i>
                    </span>
                    {!! $errors->first('video') !!}
                </div>        
                <div class="form-group">
                    {!! Form::label('main_text', trans('admin.main-text')) !!}
                     <span class="input-icon icon-right">
                        {!! Form::textarea('main_text', $post->main_text, ['id'=>'elm1', 'class' => 'form-control', 'placeholder'=>trans('admin.main-text')]) !!}
                        <i class="fa fa-pencil darkorange"></i>
                    </span>
                    {!! $errors->first('main_text') !!}
                </div>
                <div class="form-group has-feedback {{ $errors->has('location') ? ' has-error ' : '' }}">
                    {!! Form::label('location', trans('admin.location') , array('class' => 'control-label')); !!}
                    <span class="input-icon icon-right">
                        {!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('profile.ph-location'))) !!}
                        <i class="fa fa-globe blue"></i>
                    </span>
                    @if ($errors->has('location'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('workflow', trans('admin.workflow') , array('class' => 'control-label')); !!}
                    {{Form::select('workflow', 
                        array(
                            'pending' => 'Pending',
                            'redjected' => 'Redjected', 
                            'posted' => 'Posted'
                        ), $post->workflow,
                        array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    {!! Form::label('category', trans('admin.category') , array('class' => 'control-label')); !!}
                    {{Form::select('category_id', 
                        $categories, $post->category->id,
                        array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    {!! Form::label('author', trans('admin.author') , array('class' => 'control-label')); !!}
                    {{Form::select('user_id', 
                        $users, optional($post->author)->id,
                        array('id'=>'author', 'class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    {!! Form::label('assigned_users', trans('posts.assigned-users') , array('class' => 'control-label')); !!}
                    {{Form::select('assigned_users[]', 
                        $users, $assignedUsers,
                        array('id'=>'assigned_users', 'class'=>'form-control', 'multiple'=>'multiple'))}}
                </div>
                <div class="form-group">
                    {!! Form::label('tags', trans('admin.tags') , array('class' => 'control-label')); !!}
                    {{Form::select('tags[]', 
                        $tags, $assignedTags,
                        array('id'=>'tags', 'class'=>'form-control', 'multiple'=>'multiple'))}}
                </div>

                {!! Form::button('<i class="fa fa-save"></i> '.trans('posts.update'), array('class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer_scripts')

    @if(config('settings.googleMapsAPIStatus'))
        @include('scripts.gmaps-address-lookup-api3')
    @endif
    <script>
        $("#author").select2();
        $("#assigned_users").select2({
            placeholder: "{{trans('posts.assign-user')}}",
            allowClear: true
        })
        $("#tags").select2({
            placeholder: "{{trans('posts.add-tags')}}",
            tags: true
        });
    </script>
@endsection
