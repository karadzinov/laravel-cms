@extends('admin/master')

@section('pageTitle')
    {{trans('faq-categories.faq-categories')}}
@endsection

@section('content')
	    <div class="widget">

	        <div class="widget-header bordered-bottom bordered-blue">
	            <span class="widget-caption">
	                <i class="fa fa-question"></i> 
	                {{trans('faq-categories.faq-categories')}}
	            </span>
	        </div>
	        <div class="widget-body">
	        	<a href="{{ route('admin.faq-categories.create') }}" class="btn btn-success btn-lg">
	        		<i class="fa fa-plus"></i> 
	        	    {{trans('faq-categories.create-new')}}
	        	</a>
	        	@if($categories->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>{{trans('admin.id')}}</th>
					                <th>{{trans('admin.name')}}</th>
					                <th>{{trans('admin.icon')}}</th>
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
					            @foreach($categories as $category)
					                <tr>
					                    <td>{{$category->id}}</td>
					                    <td>
                                            {{$category->name}}
                                        </td>
					                    <td>
                                            <i class="fa fa-{{$category->icon}}" aria-hidden="true"></i>
                                        </td>
	                                    <td class="hidden-xs hidden-md">
	                                    	{{$category->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td class="hidden-xs hidden-md">{{$category->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.faq-categories.show', [$category->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
					                        	<i class="fa fa-eye"></i> 
					                            {{trans('admin.show')}}
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.faq-categories.edit', [$category->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
					                        	<i class="fa fa-edit"></i> 
					                            {{trans('admin.edit')}}
					                        </a>
					                    </td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.faq-categories.delete', [$category->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('faq-categories.delete'), 'data-message' => trans('faq-categories.confirm-delete'))) !!}
					                        {!! Form::close() !!}
					                    </td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
					</div>
	            @endif
	            <div class="text-center">
           			{!!$categories->links()!!}
           		</div>
	        </div>
	    </div>
	    @include('modals/modal-delete')
@endsection

@section('footer_scripts')
    @include('scripts/delete-modal-faq')
@endsection