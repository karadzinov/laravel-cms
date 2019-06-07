@extends('layouts.app')

@section('content')
    <div class="widget">
        
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-pencil"></i> 
            	Posts
            </span>
        </div>

        <div class="widget-body">
    		<a href="{{ route('posts.create') }}" class="btn btn-success btn-lg">
    	        Create new Post
    	    </a>

            @if($posts->isNotEmpty())
                <div class="table-responsive users-table">
                    <table class="table table-striped table-sm data-table">
                        <caption id="user_count">
                            {{$posts->count()}} posts total
                        </caption>
                        <thead class="thead">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Location</th>
                                <th>Workflow</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                                <th></th>
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody id="users_table">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{!!$post->title!!}</td>
                                    <td>{!!$post->subtitle!!}</td>
                                    <td>{{$post->location}}</td>
                                    <td>
                                        @php
                                            if($post->workflow === 'pending'){
                                                $labelClass = 'warning';
                                            }elseif($post->workflow === 'posted'){
                                                $labelClass = 'success';
                                            }else{
                                                $labelClass = 'danger';
                                            }
                                        @endphp
                                        <span class="label label-{{$labelClass}}">
                                            {{$post->workflow}}
                                        </span>
                                    </td>
                                    <td>{{optional($post->author)->name}}</td>
                                    <td>{{$post->created_at->format('d-m-Y, H:i')}}</td>
                                    <td>{{$post->updated_at->format('d-m-Y, H:i')}}</td>
                                    <td>
                                        {!! Form::open(array('url' => route('posts.delete', [$post->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::button('Delete', array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Post', 'data-message' => 'Are you sure you want to delete this post ?')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-success btn-block" href="{{ route('posts.show', [$post->id])}}" data-toggle="tooltip" title="Show">
                                            Show
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning btn-block" href="{{route('posts.edit', [$post->id])}}}}" data-toggle="tooltip" title="Edit">
                                            Edit
                                        </a>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        
    </div>
    @include('modals.modal-delete-settings')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection