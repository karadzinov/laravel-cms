@extends('layouts.app')

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
	        	    {{trans('testimonials.create-new')}}
	        	</a>
	        	@if($testimonials->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>Id</th>
					                <th>{{trans('admin.title')}}</th>
					                <th>{{trans('admin.subtitle')}}</th>
					                <th>{{trans('admin.name')}}</th>
					                <th>{{trans('admin.company')}}</th>
					                <th>{{trans('admin.content')}}</th>
					                <th>{{trans('admin.created-at')}}</th>
					                <th>{{trans('admin.updated-at')}}</th>
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
                                            {{$testimonial->company}}
                                        </td>
                                        <td>
                                            {{$testimonial->content}}
                                        </td>
	                                    <td>
	                                    	{{$testimonial->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td>{{$testimonial->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.testimonials.delete', [$testimonial->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button(trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('pages.delete'), 'data-message' => trans('pages.confirm-delete'))) !!}
					                        {!! Form::close() !!}
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-success btn-block" href="{{ route('admin.testimonials.show', [$testimonial->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
					                            {{trans('admin.show')}}
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.testimonials.edit', [$testimonial->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
					                            {{trans('admin.edit')}}
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