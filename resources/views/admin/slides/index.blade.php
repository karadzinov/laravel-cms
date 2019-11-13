@extends('admin/master')

@section('pageTitle')
    {{trans('slides.slides')}}
@endsection
@section('head')
	@if($slides->count() > 1)
		 <link href="{{asset('assets/admin/js/jquery-ui-1.12.1/jquery-ui.min.css')}}"></link>
	@endif
	<style>
	#sortable { 
		list-style-type: none;
		margin: 0;
		padding: 0;
		width: 100%;
	}
  	#sortable li {
  		cursor: move;
  		margin: 5px;
  		padding: 15px;
  	}
	.ui-state-highlight {
		height: 3em;
		background: #FFEA00;
	}
	.choice-image{
		height: 40px;
		width: 60px;
		margin-right: 10px;
	}
  </style>
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
	        	@if($slides->count() > 1)
					<a id="changeSlidesOrder" style="margin-left:10px;" href="javascript:void(0)" class="btn btn-info btn-lg">
						<i class="fa fa-list-ol"></i> 
						{{trans('translations.change-order')}}
					</a>
	        	@endif
	        	@if($slides->isNotEmpty())
					<div class="table-responsive">
					    <table class="table table-striped table-sm data-table">
					        <thead class="thead">
					            <tr>
					                <th>{{trans('admin.position')}}</th>
				                	<th class="hidden-xs">{{trans('admin.top-title')}}</th>
					                <th>{{trans('admin.title')}}</th>
					                <th class="hidden-xs">{{trans('admin.subtitle')}}</th>
					                <th class="hidden-xs">{{trans('admin.active')}}</th>
					                <th class="hidden-xs hidden-md">{{trans('admin.created-at')}}</th>
					                <th class="hidden-xs hidden-md">{{trans('admin.updated-at')}}</th>
					                <th>{{trans('admin.actions')}}</th>
					                <th></th> 
					                <th></th> 
					            </tr>
					        </thead>
					        <tbody>
					            @foreach($slides as $slide)
					                <tr>
					                    <td>
					                    	@if($slide->active)
					                    		{{$loop->iteration}}
					                    	@else
												x
					                    	@endif
					                    	</td>
					                    <td class="hidden-xs">
                                            {{$slide->top_title}}
                                        </td>
					                    <td>
                                            {{$slide->title}}
                                        </td>
                                        <td class="hidden-xs" >
                                            {{$slide->subtitle}}
                                        </td>
                                        <td class="hidden-xs" >
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
	                                    <td class="hidden-xs hidden-md">
	                                    	{{$slide->created_at->format('d-m-Y, H:i')}}
	                                    </td>
					                    <td class="hidden-xs hidden-md">{{$slide->updated_at->format('d-m-Y, H:i')}}</td>
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

	            {!!$slides->links()!!}
	        </div>
	    </div>
	    @include('modals/modal-delete')
@endsection

@section('footer_scripts')
    @include('scripts/delete-modal-faq')
	@if($slides->count() > 1)
	    <script src="{{asset('assets/admin/js/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
	    {{-- selectable on mobile --}}
	    <script src="{{asset('assets/admin/js/jquery.ui.touch-punch.min.js')}}"></script>
	    <script>
	    	$(document).ready(function(){
	    		$('#changeSlidesOrder').on('click', function(){
	    			$.ajax({
	    			  	url: '{{route('admin.slides.changeOrder')}}',
	    			  	success: function(response){
	    			  		callSortableModal(response.view);
	    			  	},
	    			  	error: function(response){
	    			  		alert('{{trans('admin.ops')}}')
	    			  	}
	    			});
	    		});

	    		function callSortableModal(view){
	    			bootbox.dialog({
	  			        message: view,
	  			        title: "{{trans('translations.drag-and-drop')}}",
	  			        className: "modal-darkorange",
	  			        buttons: {
	  			            success: {
	  			                label: "<i class='fa fa-save'></i> {{trans('admin.save')}}",
	  			                className: "btn-success",
	  			                callback: function () {
		                			storeOrder();
	  			                }
	  			            },
	  			            "Cancel": {
	  			            	label: "<i class='fa fa-remove'></i> {{trans('admin.cancel')}}",
	  			                className: "btn-danger",
	  			                callback: function () { }
	  			            }
	  			        }
	  			    });
	    		};

	    		function storeOrder(){
	    			var links = $('#sortable li');
	    			var data = [];
	    			for(var i = 0; i< links.length; i++){
	    				data.push($(links[i]).data('id'));
	    			}
	    			$.ajaxSetup({
					    headers:
					    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
					});
					$.ajax({
					    type: 'POST',
					    url: '{{route('admin.slides.storeOrder')}}',
					    data: {
					        data: JSON.stringify(data)
					    },
					    success:function(response){
					    	if(response.status === 200){
					    		location.reload();
					    	}else{
					    		alert('{{trans('admin.ops')}}');
					    	}
					    },
					    error: function(response){
					    	alert('{{trans('admin.ops')}}');
					    }
					})
	    		}
	    	});
	    </script>
    @endif
@endsection