@extends('layouts.app')

@section('pageTitle')
    {{trans('scripts.scripts')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-code"></i> 
            	{{trans('scripts.scripts')}}
            </span>
            <a href='{{route('admin.scripts.index')}}' class="btn btn-light pull-right" title="Back To Scripts">
                <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                {{trans('scripts.back-to')}}
            </a>
            <a href="{{route('admin.scripts.edit', $script->id)}}" class="btn btn-warning pull-right">
                {{trans('scripts.edit')}}
            </a>
        </div>
        <div class="widget-body">
        	<div>
        		<label for="name"><strong>{{trans('admin.name')}}:</strong></label>
        		<p id="name">{{$script->name}}</p>
        	</div>
        	<div>
        		<label for="code">{{trans('admin.code')}}:</label>
        		<pre id="code"><code>{{$script->code}}</code></pre>
        	</div>
        	<div>
        		<label for="active">{{trans('admin.active')}}:</label>
        		<div>
	        		@if($script->active)
						<span class="label label-success">
	                        {{trans('admin.active')}}
	                    </span>
	        		@else
						<span class="label label-danger">
		                    {{trans('admin.not-active')}}
		                </span>
	        		@endif
        		</div>
        	</div>
        </div>
    </div>
@endsection