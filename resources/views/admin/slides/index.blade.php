@extends('admin/master')

@section('pageTitle')
    {{trans('slides.slides')}}
@endsection

@section('content')
	    <div class="widget">

	        <div class="widget-header bordered-bottom bordered-blue">
	            <span class="widget-caption">
	                <i class="fa fa-comments"></i> 
	                {{trans('slides.slides')}}
	            </span>
	        </div>
	        <div class="widget-body">
	        	<a href="{{ route('admin.slides.create') }}" class="btn btn-success btn-lg">
	        		<i class="fa fa-edit"></i> 
	        	    {{trans('slides.create-new')}}
	        	</a>
	        	@if($slides->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>Id</th>
					                <th>{{trans('admin.title')}}</th>
					                <th>{{trans('admin.subtitle')}}</th>
					                <th>{{trans('admin.video')}}</th>
					                <th>{{trans('admin.link')}}</th>
				                	<th>{{trans('admin.active')}}</th>
					                <th>{{trans('admin.created-at')}}</th>
					                <th>{{trans('admin.updated-at')}}</th>
					                <th>{{trans('admin.actions')}}</th>
					                <th></th> 
					                <th></th> 
					            </tr>
					        </thead>
					        <tbody id="users_table">
					            @foreach($slides as $slide)
					                <tr>
					                    <td>{{$slide->id}}</td>
					                    <td>
                                            {{$slide->title}}
                                        </td>
                                        <td>
                                            {{$slide->subtitle}}
                                        </td>
					                    <td>
                                            {{$slide->video}}
                                        </td>
                                        <td>
                                            {{$slide->link}}
                                        </td>
                                        <td>
                    		        		@if($slide->active)
                    							<span class="label label-success">
                    		                        {{trans('admin.active')}}
                    		                    </span>
                    		        		@else
                    							<span class="label label-danger">
                    			                    {{trans('admin.not-active')}}
                    			                </span>
                    		        		@endif
                                        </td>
	                                    <td>
	                                    	{{$slide->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td>{{$slide->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.slides.show', [$slide->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
					                        	<i class="fa fa-eye"></i> 
					                            {{trans('admin.show')}}
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.slides.edit', [$slide->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
					                        	<i class="fa fa-edit"></i> 
					                            {{trans('admin.edit')}}
					                        </a>
					                    </td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.slides.delete', [$slide->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('slides.delete'), 'data-message' => trans('slides.confirm-delete'))) !!}
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
	    @include('modals/modal-delete')
@endsection

@section('footer_scripts')
    @include('scripts/delete-modal-faq')
@endsection