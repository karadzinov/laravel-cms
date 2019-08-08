@extends('layouts.app')

@section('content')
	    <div class="widget">

	        <div class="widget-header bordered-bottom bordered-blue">
	            <span class="widget-caption">
	                <i class="fa fa-comments"></i> 
	                Testimonials
	            </span>
	        </div>
	        <div class="widget-body">
	        	<a href="{{ route('admin.testimonials.create') }}" class="btn btn-success btn-lg">
	        	    Create new Testimonials
	        	</a>
	        	@if($testimonials->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>Id</th>
					                <th>Title</th>
					                <th>Name</th>
					                <th>Content</th>
					                <th>Created At</th>
					                <th>Updated At</th>
					                <th>Actions</th>
					                <th></th>
					                <th></th> 
					            </tr>
					        </thead>
					        <tbody id="users_table">
					            @foreach($testimonials as $testimonial)
					                <tr>
					                    <td>{{$testimonial->id}}</td>
					                    <td>
                                            {{$testimonial->title}}
                                        </td>
					                    <td>
                                            {{$testimonial->name}}
                                        </td>
                                        <td>
                                            {{$testimonial->content}}
                                        </td>
	                                    <td>
	                                    	{{$testimonial->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td>{{$testimonial->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.testimonials.delete', [$testimonial->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button('Delete', array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Testimonial Category', 'data-message' => 'Are you sure you want to delete this testimonial ?')) !!}
					                        {!! Form::close() !!}
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-success btn-block" href="{{ route('admin.testimonials.show', [$testimonial->id])}}" data-toggle="tooltip" title="Show">
					                            Show
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.testimonials.edit', [$testimonial->id])}}" data-toggle="tooltip" title="Edit">
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