@extends('layouts.app')
@section('head')
    <style>
        label{
            display: block;
        }
    </style>
@endsection
@section('content')
    <div class="widget">
        
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-pencil"></i> 
            	{!!$post->title!!}
            </span>
            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">
                {{trans('posts.edit')}}
            </a>
            <a href="{{route('admin.posts.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('posts.back-to')}}
            </a>
        </div>

        <div class="widget-body">
            <div>
                <label for="name"><strong>{{trans('admin.title')}}:</strong></label>
                <p id="name">{!!$post->title!!}</p>
            </div>

            <div>
                <label for="name"><strong>{{trans('admin.subtitle')}}:</strong></label>
                <p id="name">{!!$post->subtitle!!}</p>
            </div>

            <div>
                <label for="name"><strong>{{trans('admin.workflow')}}:</strong></label>
               <div>
                    @if($post->workflow === 'pending')
                        <span class="label label-warning">
                            {{trans('posts.pending')}}
                        </span>
                    @elseif($post->workflow === 'posted')
                        <span class="label label-success">
                            {{trans('posts.posted')}}
                        </span>
                    @else
                        <span class="label label-danger">
                            {{trans('posts.redjected')}}
                        </span>
                    @endif
               </div>
               <br>
            </div>

            @if($post->image)
                <div>
                    <label for="image"><strong>{{trans('admin.image')}}:</strong></label>
                    <br>
                    <img src="{{$post->thumbnailPath}}" alt="{{$post->image}}" id="image">
                </div>
            @endif

            @if($post->video)
                <div>
                    <label for="video"><strong>{{trans('admin.video')}}:</strong></label>
                    <a href="{{$post->video}}" target="_blank">
                        <img src="{{$post->videoPreviewImage}}" alt="">
                    </a>
                </div>
                <br>
            @endif

            <div>
                <label for="main_text"><strong>{{trans('admin.main-text')}}:</strong></label>
                <pre id="main_text"><code>{!!$post->main_text!!}</code></pre>
            </div>

            @if($post->location)
                <div>
                    <label for="location"><strong>{{trans('admin.location')}}:</strong></label>
                    <p id="location">{{$post->location}}</p>
                </div>
            @endif

            <div>
                <label for="category"><strong>{{trans('admin.category')}}:</strong></label>
                <p id="category">{{$post->category->name}}</p>
            </div>
            @if($post->author)
                <div>
                    <label for="author"><strong>{{trans('admin.author')}}:</strong></label>
                    <p id="author">{{$post->author->name}}</p>
                </div>
            @endif
            @if($post->users->isNotEmpty())
                <div>
                    <label for="assigned_users"><strong>{{trans('posts.assigned-users')}}:</strong></label>
                    <ul id="assigned_users">
                        @foreach($post->users()->get() as $user)
                            <li>{{$user->name}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($post->tags->isNotEmpty())
                <div>
                    <label for="tags"><strong>{{trans('admin.tags')}}:</strong></label>
                    <ul id="tags">
                        @foreach($post->tags()->get() as $tag)
                            <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        
    </div>
@endsection
