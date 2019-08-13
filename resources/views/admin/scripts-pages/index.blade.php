@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-code"></i> 
            	{{trans('scripts.scripts')}}
            </span>
        </div>
        <div class="widget-body">
        	<a href="{{ route('admin.scripts.create') }}" class="btn btn-success btn-lg">
                {{trans('scripts.create-new')}}
            </a>

            @if($scripts->isNotEmpty())
				<div class="table-responsive users-table">
				    <table class="table table-striped table-sm data-table">
				        <caption id="user_count">
				            {{$scripts->count()}} {{trans('scripts.total')}}
				        </caption>
				        <thead class="thead">
				            <tr>
				                <th>Id</th>
				                <th>{{trans('admin.name')}}</th>
				                <th>{{trans('admin.active')}}</th>
				                <th>{{trans('admin.created-at')}}</th>
				                <th>{{trans('admin.updated-at')}}</th>
				                <th>{{trans('admin.actions')}}</th>
				                <th></th>
				                <th></th> 
				            </tr>
				        </thead>
				        <tbody id="users_table">
				            @foreach($scripts as $script)
				                <tr>
				                    <td>{{$script->id}}</td>
				                    <td>{{$script->name}}</td>
				                    <td>
						        		@if($script->active)
											<span class="label label-success">
						                        {{trans('admin.active')}}
						                    </span>
						        		@else
											<span class="label label-danger">
							                    {{trans('admin.not-active')}}
							                </span>
						        		@endif
				                    </td>
				                    <td>{{$script->created_at->format('d-m-Y, H:i')}}</td>
				                    <td>{{$script->updated_at->format('d-m-Y, H:i')}}</td>
				                    <td>
				                        {!! Form::open(array('url' => route('admin.scripts.delete', [$script->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
				                            {!! Form::hidden('_method', 'DELETE') !!}
				                            {!! Form::button(trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('scripts.delete'), 'data-message' => trans('scripts.confirm-delete'))) !!}
				                        {!! Form::close() !!}
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.scripts.show', [$script->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
				                            {{trans('admin.show')}}
				                        </a>
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.scripts.edit', [$script->id])}}}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
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
    @include('modals.modal-delete-settings')
    
@endsection

@section('footer_scripts')

    @include('scripts.delete-modal-script')
@endsection
