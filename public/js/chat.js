$(document).ready(function(){
	$('.userPresence').hide();
	let csrf = $('meta[name="csrf-token"]').attr('content');
	let privateConversations = takeConversationsIds();
	let typingTimer = false;
	let notificationText = 'new messages';
	let onlineUsers = [];
	// public channel
	window.Echo.channel('publicChat')
		.listen('PublicMessageSent', e=>appendNewMessage(e, $('.publicMessages')));

	// presence channel
	window.Echo.join('presentUsers')
		.here(users=>{
			users = users.map(a => a.name);
			onlineUsers = users;
			checkWhoIsOnline(onlineUsers);
		})
		.joining(user=>{
			if(!onlineUsers.includes(user.name)){
				onlineUsers.push(user.name);
			}
			checkWhoIsOnline(onlineUsers);

			let message = user.name + ' is now online.';
			notifyPresence('alert-success', message);

		}).
		leaving(user=>{
			onlineUsers.splice(onlineUsers.indexOf(user.name), 1);
			checkWhoIsOnline(onlineUsers);
			let message = user.name + ' has left.';
			notifyPresence('alert-warning', message);
		});

	// private channels
	for(let i = 0; i<privateConversations.length; i++){
		window.Echo.private('privateMessage.'+privateConversations[i])
			.listen('PrivateMessageSent', e=>appendNewMessage(e, $('#messages-list-'+privateConversations[i])))
			.listenForWhisper('typing', e=>showWhoIsTyping(e));
	}

	window.Echo.private('newConversationCreated.' + window.User.id)
		.listen('ConversationCreated', e=>{
			addAndOpenNewConversation(e.data)
		});

	// get histories
	$('#publicChat').on('click', function(){
		$('#chatbar-messages').html('');
		let conversation = $(this).data('conversation');
		let publicChat = true;
		getConversationHistory(conversation, publicChat);
	});

	//private chats
	$('.contact').not('#publicChat').on('click', function(){
		$('#chatbar-messages').html('');
		let conversation = $(this).data('conversation');
		
		getConversationHistory(conversation);
	});

	function appendNewMessage(e, element){
		let message = e.message;
	    message = buildReply(message.content, message.user, message.time);
	    
	    element.append(message);
	    if($('#chat-link').hasClass('open')){
        	$('.chatbar-messages .messages-list').slimscroll({ scrollBy: '400px' });
	    }

	    showNotification(e.conversationId);       
	}

	function showNotification(id){
		let notification = $('#notification-'+id);
		notification.html('new messages');
		notification.show();
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
		notification.toggle();
		setTimeout(function(){
			notification.toggle();
		}, 2000);
	}

	function getConversationHistory(conversation, public){
		public = public || 0;
		$.ajaxSetup({
		    headers:
		    { 'X-CSRF-TOKEN': csrf }
		});
		$.ajax({
		    type: 'GET',
		    url: '/admin/conversationHistory',
		    data: {
		        conversation: conversation,
		        public: public
		    },
		    success: function(response){
		        $('#chatbar-messages').val('');
		        $('#chatbar-messages').html(response);
       			$('#notification-'+conversation).hide();
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
	                	storeConversation();
	                }
	            },
	            "Cancel": {
	                className: "btn-danger",
	                callback: function () { }
	            }
	        }
	    });
	}
	
	function storeConversation(){
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
    	$('.page-chatbar .chatbar-contacts .contacts-list li:first-child').after(response.view)
    	// let contact = '.contact .conversation-' + response.conversationId;
    	// $(contact).trigger('click');//doesn't work
    	$('.page-chatbar .chatbar-messages').html('');
    	getConversationHistory(response.conversationId);
    	$('.page-chatbar .chatbar-contacts').hide();
		$('.page-chatbar .chatbar-messages').show();
		window.Echo.private('privateMessage.'+response.conversationId)
			.listen('PrivateMessageSent', e=>appendNewMessage(e, $('#messages-list-'+response.conversationId)))
			.listenForWhisper('typing', e=>showWhoIsTyping(e));
		checkWhoIsOnline(onlineUsers);
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

	function checkWhoIsOnline(users){
		
		let conversationContacts = $('.conversations');
		conversationContacts.each(function(index, contact){
			
			let participants = $(contact).data('participants');
			participants = Array.from(Object.values(participants));
			let multiple = 0;

			for(let j = 0; j < participants.length; j++){
				let status = $(contact).find('.status');
				let statusClass = $(contact).find('.online-offline');
				
				if(users.includes(participants[j])){
					multiple++;
				}

				if(multiple === 1){
					statusClass.removeClass('offline')
					statusClass.addClass('online');
					status.html('online');
				}else if(multiple>1){
					statusClass.removeClass('offline')
					statusClass.addClass('online');
					status.html(multiple + ' users online');
				}else{
					statusClass.removeClass('online');
					statusClass.addClass('offline');
					status.html('offline');
				}
			}
		});
	}
});