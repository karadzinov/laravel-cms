@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-question"></i> 
                FAQs
            </span>
        </div>
        <div class="widget-body">
        	<a href="{{ route('admin.faq.create') }}" class="btn btn-success btn-lg">
        	    Create new FAQ
        	</a>
        	@if($faqs->isNotEmpty())
				<div class="table-responsive users-table">
				    <table class="table table-striped table-sm data-table">
				        <thead class="thead">
				            <tr>
				                <th>Id</th>
				                <th>Question</th>
				                <th>Answer</th>
				                <th>Created At</th>
				                <th>Updated At</th>
				                <th>Actions</th>
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
				                    <td>
                                                        @if (strlen($faq->answer)> 250)
                                                            {!! substr($faq->answer, 0 , 250)." ..."!!}
                                                        @else 
                                                            {!!$faq->answer!!}
                                                        @endif
                                                    </td>
                                                    <td>{{$faq->created_at->format('d-m-Y, H:i')}}</td>
				                    <td>{{$faq->updated_at->format('d-m-Y, H:i')}}</td>
				                    <td>
				                        {!! Form::open(array('url' => route('admin.faq.delete', [$faq->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
				                            {!! Form::hidden('_method', 'DELETE') !!}
				                            {!! Form::button('Delete', array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete FAQ', 'data-message' => 'Are you sure you want to delete this FAQ ?')) !!}
				                        {!! Form::close() !!}
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-success btn-block" href="{{ route('admin.faq.show', [$faq->id])}}" data-toggle="tooltip" title="Show">
				                            Show
				                        </a>
				                    </td>
				                    <td>
				                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.faq.edit', [$faq->id])}}" data-toggle="tooltip" title="Edit">
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