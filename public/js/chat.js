let conversation = 2;

function buildMessage(content, user, time){
	
	let message = '<li class="message replay">';
    message += '<div class="message-info">';
    message += '<div class="bullet"></div>';
    message += '<div class="contact-name">'+user+'</div>';
    message += '<div class="message-time">'+time+'</div>';
    message += '</div>';
    message += '<div class="message-body">';
    message += content;
    message += '</div>';
	message += '</li>';

	return message;
}

window.Echo.channel('publicChat').listen('PublicMessageSent', e=>{
	let message = e.message;
	message = buildMessage(message.content, message.user, message.time);
	$('#messages-list').append(message);
	
});

window.Echo.private('privateMessage.' + conversation).listen('PrivateMessageSent', e=>{
    alert('private');
    let message = e.message;
    message = buildMessage(message.content, message.user, message.time);
    
    $('#messages-list').append(message);
    
})

$( "#chatForm" ).on('submit', function(event) {
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
			$('#message').val('');alert('sent!');
			let message = buildMessage(response.content, response.user, response.time);
			$('#messages-list').append(message);
		},
        error: function(response){
        	console.log('Error.');				}
   });
});

$('#publicChat').on('click', function(){
	$.ajaxSetup({
	    headers:
	    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
	    type: 'GET',
	    url: '/admin/publicChat',
	    data: {
	        
	        },
	    success: function(response){
	        $('#chatbar-messages').val('');
	        $('#chatbar-messages').html(response);
	    },
	    error: function(response){
	       console.log('Error.')
	    }
	});
});

//private chats
$('.contact').not('#publicChat').on('click', function(){

	let conversationId = conversation = $(this).data('conversation');
	window.Echo.private('privateMessage.' + conversation).listen('PrivateMessageSent', e=>{
    alert('private');
    let message = e.message;
    message = buildMessage(message.content, message.user, message.time);
    
    // $('#messages-list').append(message);
	    
	})
	$.ajaxSetup({
	    headers:
	    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
	    type: 'GET',
	    url: '/admin/privateChat',
	    data: {
	        conversation: conversationId
	    },
	    success: function(response){
	        $('#chatbar-messages').val('');
	        $('#chatbar-messages').html(response);
	        console.log(typeof ('privateChat.' + conversation));
	    },
	    error: function(response){
	       console.log('Error.')
	    }
	});
});