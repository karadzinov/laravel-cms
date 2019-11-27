@extends('admin/master')

@section('pageTitle')
    {{trans('testimonials.testimonials')}}
@endsection

@section('content')
	    <div class="widget">

	        <div class="widget-header bordered-bottom bordered-blue">
	            <span class="widget-caption">
	                <i class="fa fa-comments"></i> 
	                {{trans('testimonials.testimonials')}}
	            </span>
	        </div>
	        <div class="widget-body">
	        	<a href="{{ route('admin.testimonials.create') }}" class="btn btn-success btn-lg">
	        		<i class="fa fa-edit"></i> 
	        	    {{trans('testimonials.create-new')}}
	        	</a>
	        	@if($testimonials->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>{{trans('admin.id')}}</th>
					                <th class="hidden-xs">{{trans('admin.title')}}</th>
					                <th>{{trans('admin.name')}}</th>
					                <th class="hidden-xs">{{trans('admin.company')}}</th>
					                <th class="hidden-xs hidden-md">{{trans('admin.content')}}</th>
					                <th class="hidden-xs hidden-md">{{trans('admin.created-at')}}</th>
					                <th class="hidden-xs">{{trans('admin.content')}}</th>
					                <th>{{trans('admin.actions')}}</th>
					                <th></th> 
					                <th></th> 
					            </tr>
					        </thead>
					        <tbody id="users_table">
					            @foreach($testimonials as $testimonial)
					                <tr>
					                    <td>{{$testimonial->id}}</td>
					                    <td class="hidden-xs">
                                            {{$testimonial->title}}
                                        </td>
					                    <td>
                                            {{$testimonial->name}}
                                        </td>
                                        <td class="hidden-xs">
                                            {{$testimonial->company}}
                                        </td>
                                        <td class="hidden-xs">
                                            {{$testimonial->content}}
                                        </td>
	                                    <td class="hidden-xs hidden-md">
	                                    	{{$testimonial->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td class="hidden-xs hidden-md">{{$testimonial->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.testimonials.show', [$testimonial->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
					                        	<i class="fa fa-eye"></i> 
					                            {{trans('admin.show')}}
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.testimonials.edit', [$testimonial->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
					                        	<i class="fa fa-edit"></i> 
					                            {{trans('admin.edit')}}
					                        </a>
					                    </td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.testimonials.delete', [$testimonial->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('testimonials.delete'), 'data-message' => trans('testimonials.confirm-delete'))) !!}
					                        {!! Form::close() !!}
					                    </td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
					</div>
	            @endif
	            <div class="text-center">
	            	{!!$testimonials->links()!!}
	            </div>
	        </div>
	    </div>
	    @include('modals/modal-delete')
@endsection

@section('footer_scripts')
    @include('scripts/delete-modal-faq')
@endsection