@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">

                @include('panels.welcome-panel')

                    <div class="container">
                        <div class="row">

                        	<h1 id="me">aaa</h1>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Send message</div>
                                    <form id="chatForm" action="admin/sendmessage" method="POST">
                                    	{{csrf_field()}}
                                        <input id="message" type="text" name="message" >
                                        <input type="submit" value="send">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    	<div class="col-lg-8 col-lg-offset-2" >
                    	  <div id="messages" ></div>
                    	</div>
                    </div>
                 

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>

	  <script>
        var socket = io.connect('http://192.168.10.10:8890');
        console.log(socket);


        socket.on('message', function (data) {
        	console.log(data);
        	$( "#me" ).append( "<p>"+data+"</p>" );
          });
    </script>
    <script>
    $( "#chatForm" ).on('submit', function( event ) {
  			event.preventDefault();
  			 $.ajaxSetup({
                        headers:
                        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });
            $.ajax({
                type: 'POST',
                url: '/admin/sendmessage',
                data: {
                	message: $('#message').val()
				},
                success: function(response){
				},
                error: function(response){
				 }
           });

	});
    </script>
@endsection
