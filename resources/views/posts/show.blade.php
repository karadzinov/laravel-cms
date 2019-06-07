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
            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">
                Edit Post
            </a>
            <a href="{{route('posts.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                Back To Posts
            </a>
        </div>

        <div class="widget-body">
            <div>
                <label for="name"><strong>Title:</strong></label>
                <p id="name">{!!$post->title!!}</p>
            </div>

            <div>
                <label for="name"><strong>Subtitle:</strong></label>
                <p id="name">{!!$post->subtitle!!}</p>
            </div>

            <div>
                <label for="name"><strong>Workflow:</strong></label>
                @php
                   if($post->workflow === 'pending'){
                       $labelClass = 'warning';
                   }elseif($post->workflow === 'posted'){
                       $labelClass = 'success';
                   }else{
                       $labelClass = 'danger';
                   }
               @endphp
               <div>
                    <span class="label label-{{$labelClass}}">
                        {{$post->workflow}}
                    </span>
               </div>
               <br>
            </div>

            @if($post->image)
                <div>
                    <label for="image"><strong>Image:</strong></label>
                    <br>
                    <img src="{{$post->thumnailPath}}" alt="{{$post->image}}" id="image">
                </div>
            @endif

            @if($post->video)
                <div>
                    <label for="video"><strong>Video:</strong></label>
                    <a href="{{$post->video}}" target="_blank">
                        <img src="{{$post->videoPreviewImage}}" alt="">
                    </a>
                </div>
                <br>
            @endif

            <div>
                <label for="main_text"><strong>Main Text:</strong></label>
                <pre id="main_text"><code>{!!$post->main_text!!}</code></pre>
            </div>

            @if($post->location)
                <div>
                    <label for="location"><strong>Location:</strong></label>
                    <p id="location">{{$post->location}}</p>
                </div>
            @endif

            <div>
                <label for="category"><strong>Category:</strong></label>
                <p id="category">{{$post->category->name}}</p>
            </div>
            @if($post->author)
                <div>
                    <label for="author"><strong>Author:</strong></label>
                    <p id="author">{{$post->author->name}}</p>
                </div>
            @endif
            @if($post->users->isNotEmpty())
                <div>
                    <label for="assigned_users"><strong>Assigned Users:</strong></label>
                    <ul id="assigned_users">
                        @foreach($post->users()->get() as $user)
                            <li>{{$user->name}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        
    </div>
@endsection