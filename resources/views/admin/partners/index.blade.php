@extends('admin/master')

@section('pageTitle')
    {{trans('partners.partners')}}
@endsection

@section('content')
	    <div class="widget">

	        <div class="widget-header bordered-bottom bordered-blue">
	            <span class="widget-caption">
	                <i class="fa fa-comments"></i> 
	                {{trans('partners.partners')}}
	            </span>
	        </div>
	        <div class="widget-body">
	        	<a href="{{ route('admin.partners.create') }}" class="btn btn-success btn-lg">
	        		<i class="fa fa-edit"></i> 
	        	    {{trans('partners.create-new')}}
	        	</a>
	        	@if($partners->isNotEmpty())
					<div class="table-responsive users-table">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>Id</th>
					                <th>{{trans('admin.name')}}</th>
					                <th class="hidden-xs">
					                	{{trans('admin.link')}}
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
					            @foreach($partners as $partner)
					                <tr>
					                    <td>{{$partner->id}}</td>
					                    <td>
                                            {{$partner->name}}
                                        </td>
					                    <td class="hidden-xs">
                                            {{$partner->link}}
                                        </td>
	                                    <td class="hidden-xs hidden-md">
	                                    	{{$partner->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td class="hidden-xs hidden-md">{{$partner->updated_at->format('d-m-Y, H:i')}}</td>
					                    <td>
					                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.partners.show', [$partner->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
					                        	<i class="fa fa-eye"></i> 
					                            {{trans('admin.show')}}
					                        </a>
					                    </td>
					                    <td>
					                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.partners.edit', [$partner->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
					                        	<i class="fa fa-edit"></i> 
					                            {{trans('admin.edit')}}
					                        </a>
					                    </td>
					                    <td>
					                        {!! Form::open(array('url' => route('admin.partners.delete', [$partner->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
					                            {!! Form::hidden('_method', 'DELETE') !!}
					                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('partners.delete'), 'data-message' => trans('partners.confirm-delete'))) !!}
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