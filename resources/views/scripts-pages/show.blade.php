@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-code"></i> 
            	Scripts
            </span>
            <a href="{{route('scripts.edit', $script->id)}}" class="btn btn-warning pull-right">Edit Script</a>
        </div>
        <div class="widget-body">
        	<div>
        		<label for="name"><strong>Name:</strong></label>
        		<p id="name">{{$script->name}}</p>
        	</div>
        	<div>
        		<label for="code">Code:</label>
        		<pre id="code"><code>{{$script->code}}</code></pre>
        	</div>
        	<div>
        		<label for="active">Active:</label>
        		<div>
	        		@if($script->active)
						<span class="label label-success graded">
	                        Active
	                    </span>
	        		@else
						<span class="label label-danger graded">
		                    Not Active
		                </span>
	        		@endif
        		</div>
        	</div>
        </div>
    </div>
@endsection