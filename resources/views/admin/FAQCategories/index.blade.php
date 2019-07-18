@extends('layouts.app')

@section('content')
	    <div class="widget">

	        <div class="widget-header bordered-bottom bordered-blue">
	            <span class="widget-caption">
	                <i class="fa fa-question"></i> 
	                FAQ Categories
	            </span>
	        </div>
	        <div class="widget-body">
	        	<a href="{{ route('admin.faq-categories.create') }}" class="btn btn-success btn-lg">
	        	    Create new FAQ Category
	        	</a>
	        	@if($categories->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>Id</th>
					                <th>Name</th>
					                <th>Icon</th>
					                <th>Created At</th>
					                <th>Updated At</th>
					                <th>Actions</th>
					                <th></th>
					                <th></th> 
					            </tr>
					        </thead>
					        <tbody id="users_table">
					            @foreach($categories as $category)
					                <tr>
					                    <td>{{$category->id}}</td>
					                    <td>
                                            {{$category->name}}
                                        </td>
					                    <td>
                                            <i class="fa fa-{{$category->icon}}" aria-hidden="true"></i>
                                        </td>
	                                    <td>
	                                    	{{$category->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td>{{$category->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.faq-categories.delete', [$category->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button('Delete', array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete FAQ Category', 'data-message' => 'Are you sure you want to delete this FAQ Category ?')) !!}
					                        {!! Form::close() !!}
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-success btn-block" href="{{ route('admin.faq-categories.show', [$category->id])}}" data-toggle="tooltip" title="Show">
					                            Show
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.faq-categories.edit', [$category->id])}}" data-toggle="tooltip" title="Edit">
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
	    @include('modals.modal-delete')
@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-faq')
@endsection