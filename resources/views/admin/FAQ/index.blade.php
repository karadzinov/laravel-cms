@extends('admin/master')

@section('pageTitle')
    {{trans('faqs.faqs')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
                {{trans('faqs.faqs')}}
            </span>
        </div>
        <div class="widget-body">
        	<a href="{{ route('admin.faq.create') }}" class="btn btn-success btn-lg">
        		<i class="fa fa-plus"></i> 
        	    {{trans('faqs.create-new')}}
        	</a>
        	@if($faqs->isNotEmpty())
				<div class="table-responsive users-table">
				    <table class="table table-striped table-sm data-table">
				        <thead class="thead">
				            <tr>
				                <th>{{trans('admin.id')}}</th>
				                <th>{{trans('admin.question')}}</th>
				                <th class="hidden-xs">{{trans('admin.category')}}</th>
				                <th class="hidden-xs">{{trans('admin.answer')}}</th>
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
				            @foreach($faqs as $faq)
				                <tr>
				                    <td>{{$faq->id}}</td>
				                    <td>
                                        @if (strlen($faq->question)> 100)
                                            {!! substr($faq->question, 0 , 100)." ..."!!}
                                        @else 
                                            {!! $faq->question !!}
                                        @endif
                                    </td>
				                    <td class="hidden-xs">
                                        @if (strlen($faq->answer)> 250)
                                            {!! substr($faq->answer, 0 , 250)." ..."!!}
                                        @else 
                                            {!!$faq->answer!!}
                                        @endif
                                    </td>
                                    <td class="hidden-xs">{{$faq->category->name}}</td>
                                    <td class="hidden-xs hidden-md">
                                    	{{$faq->created_at->format('d-m-Y, H:i')}}
                                    </td>
				                    <td class="hidden-xs hidden-md">
				                    	{{$faq->updated_at->format('d-m-Y, H:i')}}
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.faq.show', [$faq->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
				                        	<i class="fa fa-eye"></i> 
				                            {{trans('admin.show')}}
				                        </a>
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.faq.edit', [$faq->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
				                        	<i class="fa fa-edit"></i> 
				                            {{trans('admin.edit')}}
				                        </a>
				                    </td>
				                     <td>
				                        {!! Form::open(array('url' => route('admin.faq.delete', [$faq->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
				                            {!! Form::hidden('_method', 'DELETE') !!}
				                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('faqs.delete'), 'data-message' => trans('faqs.confirm-delete'))) !!}
				                        {!! Form::close() !!}
				                    </td>
				                </tr>
				            @endforeach
				        </tbody>
				    </table>
				</div>
            @endif
        	<div class="text-center">
       			{!!$faqs->links()!!}
           	</div>
        </div>
    </div>
    @include('modals.modal-delete')

@endsection
@section('footer_scripts')
    @include('scripts.delete-modal-faq')
@endsection