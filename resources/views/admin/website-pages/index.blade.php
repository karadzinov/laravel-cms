@extends('layouts.app')

@section('pageTitle')
    {{trans('pages.pages')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-newspaper-o"></i> 
                {{trans('pages.pages')}}
            </span>
        </div>
        <div class="widget-body">
        	<a href="{{ route('admin.pages.create') }}" class="btn btn-success btn-lg">
        	    <i class="fa fa-plus"></i> 
        	    {{trans('pages.create-new')}}
        	</a>

        	@if($pages->isNotEmpty())
				<div class="table-responsive users-table">
				    <table class="table table-striped table-sm data-table">
				        <caption id="user_count">
				            {{$pages->count()}} {{trans('pages.total')}}
				        </caption>
				        <thead class="thead">
				            <tr>
				                <th>Id</th>
				                <th>{{trans('admin.title')}}</th>
				                <th>{{trans('admin.subtitle')}}</th>
				                <th>{{trans('admin.created-at')}} At</th>
				                <th>{{trans('admin.updated-at')}} At</th>
				                <th>{{trans('admin.actions')}}</th>
				                <th></th>
				                <th></th> 
				            </tr>
				        </thead>
				        <tbody id="users_table">
				            @foreach($pages as $page)
				                <tr>
				                    <td>{{$page->id}}</td>
				                    <td>{!!$page->title!!}</td>
				                    <td>
						        		{!!$page->subtitle!!}
				                    </td>
				                    <td>{{$page->created_at->format('d-m-Y, H:i')}}</td>
				                    <td>{{$page->updated_at->format('d-m-Y, H:i')}}</td>
				                    <td>
				                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.pages.show', [$page->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
				                        	<i class="fa fa-eye"></i> 
				                            {{trans('admin.show')}}
				                        </a>
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.pages.edit', [$page->id])}}}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
				                        	<i class="fa fa-edit"></i> 
				                            {{trans('admin.edit')}}
				                        </a>
				                    </td>
				                    <td>
				                        {!! Form::open(array('url' => route('admin.pages.delete', [$page->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
				                            {!! Form::hidden('_method', 'DELETE') !!}
				                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('pages.delete'), 'data-message' => trans('pages.confirm-delete'))) !!}
				                        {!! Form::close() !!}
				                    </td>
				                </tr>
				            @endforeach
				        </tbody>
				    </table>
				</div>
            @endif
        </div>
    </div>
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
