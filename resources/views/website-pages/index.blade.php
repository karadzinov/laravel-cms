@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-newspaper-o"></i> 
                Pages
            </span>
        </div>
        <div class="widget-body">
        	<a href="{{ route('pages.create') }}" class="btn btn-success btn-lg">
        	    Create new Page
        	</a>

        	@if($pages->isNotEmpty())
				<div class="table-responsive users-table">
				    <table class="table table-striped table-sm data-table">
				        <caption id="user_count">
				            {{$pages->count()}} pages total
				        </caption>
				        <thead class="thead">
				            <tr>
				                <th>Id</th>
				                <th>Title</th>
				                <th>Subtitle</th>
				                <th>Created At</th>
				                <th>Updated At</th>
				                <th>Actions</th>
				                <th></th>
				                <th></th> 
				            </tr>
				        </thead>
				        <tbody id="users_table">
				            @foreach($pages as $page)
				                <tr>
				                    <td>{{$page->id}}</td>
				                    <td>{{$page->title}}</td>
				                    <td>
						        		{{$page->subtitle}}
				                    </td>
				                    <td>{{$page->created_at->format('d-m-Y, H:i')}}</td>
				                    <td>{{$page->updated_at->format('d-m-Y, H:i')}}</td>
				                    <td>
				                        {!! Form::open(array('url' => route('pages.delete', [$page->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
				                            {!! Form::hidden('_method', 'DELETE') !!}
				                            {!! Form::button('Delete', array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Script', 'data-message' => 'Are you sure you want to delete this page ?')) !!}
				                        {!! Form::close() !!}
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-success btn-block" href="{{ route('pages.show', [$page->id])}}" data-toggle="tooltip" title="Show">
				                            Show
				                        </a>
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-warning btn-block" href="{{route('pages.edit', [$page->id])}}}}" data-toggle="tooltip" title="Edit">
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