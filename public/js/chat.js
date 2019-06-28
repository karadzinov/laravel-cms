$(document).ready(function(){
	let privateConversations = takeConversationsIds();
	let typingTimer = false;

	// listening for public channel
	window.Echo.channel('publicChat')
		.listen('PublicMessageSent', e=>appendNewMessage(e, $('.publicMessages')));

	// listening for private channels
	for(let i = 0; i<privateConversations.length; i++){
		window.Echo.private('privateMessage.'+privateConversations[i])
			.listen('PrivateMessageSent', e=>appendNewMessage(e, $('#messages-list-'+privateConversations[i])))
			.listenForWhisper('typing', e=>showWhoIsTyping(e));
	}

	function appendNewMessage(e, element){
		let message = e.message;
	    message = buildReply(message.content, message.user, message.time);
	    
	    element.append(message);
	}

	function showWhoIsTyping(e){
		$('#typing').html(e.content);

		if(typingTimer){
			clearTimeout(typingTimer);
		}
		typingTimer = setTimeout( () => {
		  $('#typing').html('');
		}, 2000);
	}

	function sendMessage(message){
		if(message){
			$.ajaxSetup({
		    	headers:
		    	{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		    });
		    $.ajax({
		        type: 'POST',
		        url: '/admin/sendmessage',
		        data: {
		        	message: message
				},
		        success: function(response){
		        	console.log(response.status);
				},
		        error: function(response){
		        	console.log('Error.');
		        }
		   });
		}
	}

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
		$('#chatbar-messages').html('');
		let conversationId = $(this).data('conversation');
		
		getConversationHistory(conversationId);
	});

	function getConversationHistory(conversationId){
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
		    },
		    error: function(response){
		       console.log('Error.')
		    }
		});
	}

	function takeConversationsIds(){
		let conversations = $('#userConversations').val();
		conversations = conversations.substring(1, conversations.length-1);
		conversations = conversations.split(',');

		return conversations;
	}

	//add new conversation
	$("#addConversationButton").on('click', function () {
		$.ajaxSetup({
		    headers:
		    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
		$.ajax({
		    type: 'GET',
		    url: '/admin/addConversation',
		    success: function(response){
		       	callNewConversationModal(response);
		    },
		    error: function(response){
		       console.log('Error.')
		    }
		});
	});

	function callNewConversationModal(body){
		bootbox.dialog({
	        message: body,
	        title: "Add New Conversation",
	        className: "modal-darkorange",
	        buttons: {
	            success: {
	                label: "Send",
	                className: "btn-success",
	                callback: function () {
	                	let name = $('#conversationName').val();
	                	let users = $('#selectUsers').val();
	                	let newMessage = ($('#newConversationMessage').val());
	                	createConversation(name, users, newMessage);
	                }
	            },
	            "Cancel": {
	                className: "btn-danger",
	                callback: function () { }
	            }
	        }
	    });
	}
	
	function createConversation(name, users, message){
	 	$.ajaxSetup({
	 	    headers:
	 	    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	 	});
	 	$.ajax({
	 	    type: 'GET',
	 	    url: '/admin/storeConversation',
	 	    data: {
	 	    	name: name,
	 	    	participants: users,
	 	    	message: message
	 	    },
	 	    success: function(response){
	 	    	$('.page-chatbar .chatbar-contacts .contacts-list').append(response.view)
	 	    	// let contact = '.contact .conversation-' + response.conversationId;
	 	    	// $(contact).trigger('click');//doesn't work
	 	    	$('.page-chatbar .chatbar-messages').html('');
	 	    	getConversationHistory(response.conversationId);
	 	    	$('.page-chatbar .chatbar-contacts').hide();
				$('.page-chatbar .chatbar-messages').show();
	 	    },
	 	    error: function(response){
	 	       console.log('Error.')
	 	    }
	 	});
	 }

	 function buildMessage(content, user, time){
		
		let message = '<li class="message">';
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

	function buildReply(content, user, time){
		
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

	 // $('.page-chatbar .chatbar-contacts .contact').on('click', function (e) {
	 //       $('.page-chatbar .chatbar-contacts').hide();
	 //       $('.page-chatbar .chatbar-messages').show();
	 // 
	 //       height: $(window).height() - (250 + additionalHeight),
	 //   });
});