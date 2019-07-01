$(document).ready(function(){
	let csrf = $('meta[name="csrf-token"]').attr('content');
	let privateConversations = takeConversationsIds();
	let typingTimer = false;

	// listening for public channel
	window.Echo.channel('publicChat')
		.listen('PublicMessageSent', e=>appendNewMessage(e, $('.publicMessages')));

	// presence channel
	window.Echo.join('presentUsers').here(users=>{
			// console.log('here');
			// console.log(users);
		})
		.joining(user=>{
			let message = user.name + 'is now online.';
			notifyPresence('alert-success', message);
		}).
		leaving(user=>{
			let message = user.name + 'has left.';
			notifyPresence('alert-warning', message);
		});

	// listening for private channels
	for(let i = 0; i<privateConversations.length; i++){
		window.Echo.private('privateMessage.'+privateConversations[i])
			.listen('PrivateMessageSent', e=>appendNewMessage(e, $('#messages-list-'+privateConversations[i])))
			.listenForWhisper('typing', e=>showWhoIsTyping(e));
	}

	// get histories
	$('#publicChat').on('click', function(){
		$.ajaxSetup({
		    headers:
		    { 'X-CSRF-TOKEN': csrf }
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

	function appendNewMessage(e, element){
		let message = e.message;
	    message = buildReply(message.content, message.user, message.time);
	    
	    element.append(message);
        $('.chatbar-messages .messages-list').slimscroll({ scrollBy: '400px' });
	}

	function showWhoIsTyping(e){
		$('#typing').html(e.content);

		if(typingTimer){
			clearTimeout(typingTimer);
		}
		typingTimer = setTimeout( () => {
		  $('#typing').html('');
		}, 1000);
	}

	function sendMessage(message){
		if(message){
			$.ajaxSetup({
		    	headers:
		    	{ 'X-CSRF-TOKEN': csrf }
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

	function notifyPresence(notificationClass, message){
		let notification = $('.userPresence');
		notification.addClass(notificationClass);
		notification.find('.userPresenceContent').html(message)
		notification.css('visibility', 'visible');
		setTimeout(function(){
			notification.css('visibility', 'hidden');
		}, 2000);
	}

	function getConversationHistory(conversationId){
		$.ajaxSetup({
		    headers:
		    { 'X-CSRF-TOKEN': csrf }
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
		    { 'X-CSRF-TOKEN': csrf }
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
	                label: "Create",
	                className: "btn-success",
	                callback: function () {
	                	createConversation();
	                }
	            },
	            "Cancel": {
	                className: "btn-danger",
	                callback: function () { }
	            }
	        }
	    });
	}
	
	function createConversation(){
		let name = $('#conversationName').val();
		let users = $('#selectUsers').val();
		let newMessage = ($('#newConversationMessage').val());

	 	$.ajaxSetup({
	 	    headers:
	 	    { 'X-CSRF-TOKEN': csrf }
	 	});
	 	$.ajax({
	 	    type: 'GET',
	 	    url: '/admin/storeConversation',
	 	    data: {
	 	    	name: name,
	 	    	participants: users,
	 	    	message: newMessage
	 	    },
	 	    success: function(response){
	 	    	addAndOpenNewConversation(response);
	 	    },
	 	    error: function(response){
	 	       console.log('Error.')
	 	    }
	 	});
	 }

	 function addAndOpenNewConversation(response){
    	$('.page-chatbar .chatbar-contacts .contacts-list').append(response.view)
    	// let contact = '.contact .conversation-' + response.conversationId;
    	// $(contact).trigger('click');//doesn't work
    	$('.page-chatbar .chatbar-messages').html('');
    	getConversationHistory(response.conversationId);
    	$('.page-chatbar .chatbar-contacts').hide();
		$('.page-chatbar .chatbar-messages').show();
	 }

	function buildReply(content, user, time){
		
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
});