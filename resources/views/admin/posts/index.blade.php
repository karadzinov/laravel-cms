@extends('admin/master')

@section('pageTitle')
    {{trans('posts.posts')}}
@endsection

@section('content')
    <div class="widget">
        
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-pencil"></i> 
            	{{trans('posts.posts')}}
            </span>
        </div>

        <div class="widget-body">
    		<a href="{{ route('admin.posts.create') }}" class="btn btn-success btn-lg">
                <i class="fa fa-plus"></i> 
    	        {{trans('posts.create-new')}}
    	    </a>

            @if($posts->isNotEmpty())
                <div class="table-responsive users-table">
                    <table class="table table-striped table-sm data-table">
                        <caption id="user_count">
                            {{$posts->count()}} {{trans('posts.total')}}
                        </caption>
                        <thead class="thead">
                            <tr>
                                <th>{{trans('admin.id')}}</th>
                                <th>{{trans('admin.title')}}</th>
                                <th class="hidden-xs">
                                    {{trans('admin.subtitle')}}
                                </th>
                                <th class="hidden-xs">
                                    {{trans('admin.category')}}
                                </th>
                                <th class="hidden-xs">
                                    {{trans('admin.location')}}
                                </th>
                                <th>{{trans('admin.workflow')}}</th>
                                <th class="hidden-xs">
                                    {{trans('admin.author')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.created-at')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.updated-at')}}
                                </th>
                                <th>{{trans('admin.actions')}}</th>
                                <th></th>
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody id="users_table">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{!!$post->title!!}</td>
                                    <td class="hidden-xs">{!!$post->subtitle!!}</td>
                                    <td class="hidden-xs">{{$post->category->name}}</td>
                                    <td class="hidden-xs">{{$post->location}}</td>
                                    <td>
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
                                    </td>
                                    <td class="hidden-xs">
                                        {{optional($post->author)->name}}
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$post->created_at->format('d-m-Y, H:i')}}
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$post->updated_at->format('d-m-Y, H:i')}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.posts.show', [$post->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
                                            <i class="fa fa-eye"></i> 
                                            {{trans('admin.show')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.posts.edit', [$post->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
                                            <i class="fa fa-edit"></i>
                                            {{trans('admin.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(array('url' => route('admin.posts.delete', [$post->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('posts.delete'), 'data-message' => trans('posts.confirm-delete'))) !!}
                                        {!! Form::close() !!}
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            {!!$posts->links()!!}
        </div>
        
    </div>
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
