@extends('layouts.app')
@section('content')

	<div id="app">
	    <users-count :registered={{ $users }} ></users-count>
	</div>
	
@endsection
