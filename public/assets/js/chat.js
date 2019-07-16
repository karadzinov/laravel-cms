$(document).ready(function(){

	class Chat {
	  	constructor() {
			let classes = {
				'online': 'offline',
				'offline': 'online'
			}
			let notificationText = 'new messages';
		    let csrf = $('meta[name="csrf-token"]').attr('content');

			this.csrf = csrf;
			this.onlineUsers = [];
			this.classes = classes;
			this.typingTimer = false;
			this.notificationText = 'new messages';
			this.authenticatedUserId = window.User.id;;
		}
	  	takeConversationsIds(){
			let conversations = $('#userConversations').val();
			conversations = conversations.substring(1, conversations.length-1);
			conversations = conversations.split(',');

			return conversations;
		}
		appendNewMessage(e, element){
			let message = e.message;
		    message = this.buildMessage(message, e.sender);
		    
		    element.append(message);
		    let open = this.openChatbarIfNecessery();
		    if(open){
		    	this.getConversationHistory(e.conversationId);
		    	$('.page-chatbar .chatbar-contacts').hide();
				$('.page-chatbar .chatbar-messages').show();
				$('#notification-'+e.conversationId).html('');
				this.checkNotifications();
		    }
		    if($('#messages-list-' + e.conversationId).length){
	        	$('.chatbar-messages .messages-list').slimscroll({ scrollBy: '400px' });
		    }else{
			    this.showNotification(e.conversationId);
		    	this.checkNotifications();
		    }
		}
		showNotification(id){
			let notification = $('#notification-'+id);
			notification.html('new messages');
			notification.show();
		}
		showWhoIsTyping(e){
			let typingSpan= $('#typing-' + e.conversation);
			typingSpan.html(e.content);

			if(this.typingTimer){
				clearTimeout(this.typingTimer);
			}
			this.typingTimer = setTimeout( () => {
			  typingSpan.html('');
			}, 1000);
		}
		notify(notificationClass, message){
			let notification = $('.flashNotification');
	        let content = notification.find('.flashNotificationContent');
	       
	        notification.addClass(notificationClass);
	        content.html(message)
	        notification.css('visibility', 'visible');
	        setTimeout(function(){
	            content.html('')
	            notification.css('visibility', 'hidden');
	        }, 2000);
		}
		getConversationHistory(conversation, publicChat){
			let chatbarMessages = $('#chatbar-messages');
			chatbarMessages.html('<div class="loader" id="conversationLoader"></div>');
			publicChat = publicChat || 0;
			$.ajaxSetup({
			    headers:
			    { 'X-CSRF-TOKEN': this.csrf }
			});
			let chat = this;
			$.ajax({
			    type: 'GET',
			    url: '/admin/conversations/conversationHistory',
			    data: {
			        conversation: conversation,
			        public: publicChat
			    },
			    success: function(response){
			        chatbarMessages.html('');
			        chatbarMessages.html(response);
	       			$('#notification-'+conversation).html('');
	       			let contact = $('#messages-contact');
	       			chat.checkContact(contact, window.users);
	       			if(publicChat){
	       				chat.checkWhoIsOnlineInPublicChat(window.users);
	       			}
	    			chat.checkNotifications();
			    },
			    error: function(response){
			       console.log('Error.')
			    }
			});
		}
		callNewConversationModal(body){
			let chat = this;
			bootbox.dialog({
		        message: body,
		        title: "Add New Conversation",
		        className: "modal-darkorange",
		        buttons: {
		            success: {
		                label: "Create",
		                className: "btn-success",
		                callback: function () {
		                	chat.storeConversation();
		                }
		            },
		            "Cancel": {
		                className: "btn-danger",
		                callback: function () { }
		            }
		        }
		    });
		}
		storeConversation(){
			let name = $('#conversationName').val();
			let users = $('#selectUsers').val();
			let newMessage = ($('#newConversationMessage').val());
			let chat = this;
		 	$.ajaxSetup({
		 	    headers:
		 	    { 'X-CSRF-TOKEN': this.csrf }
		 	});
		 	$.ajax({
		 	    type: 'GET',
		 	    url: '/admin/conversations/storeConversation',
		 	    data: {
		 	    	name: name,
		 	    	participants: users,
		 	    	message: newMessage
		 	    },
		 	    success: function(response){
		 	    	chat.addAndOpenNewConversation(response);
		 	    },
		 	    error: function(response){
		 	       console.log('Error.')
		 	    }
		 	});
		}
		addAndOpenNewConversation(response){
	    	$('.page-chatbar .chatbar-contacts .contacts-list li:first-child').after(response.view)
	    	// let contact = '.contact .conversation-' + response.conversationId;
	    	// $(contact).trigger('click');//doesn't work
	    	$('.page-chatbar .chatbar-messages').html('');
	    	this.getConversationHistory(response.conversationId);
	    	$('.page-chatbar .chatbar-contacts').hide();
			$('.page-chatbar .chatbar-messages').show();
			this.openChatbarIfNecessery(response.conversationId);

			window.Echo.private('privateMessage.'+response.conversationId)
				.listen('PrivateMessageSent', e=>this.appendNewMessage(e, $('#messages-list-'+response.conversationId)))
				.listenForWhisper('typing', e=>this.showWhoIsTyping(e));
			this.checkWhoIsOnline(onlineUsers);
		}
		openChatbarIfNecessery(){
			if(!$('#chat-link').hasClass('open')){
				$('.page-chatbar').toggleClass('open');
				$("#chat-link").toggleClass('open');

		 		return true;
		 	}

			return false;
		}
		buildMessage(comingMessage, sender){
			
			let message = '<li class="message';
			if(this.authenticatedUserId === sender){
				message += ' reply';
			}
		    message += '"><div class="message-info">';
		    message += '<div class="bullet"></div>';
		    message += '<div class="contact-name">'+comingMessage.user+'</div>';
		    message += '<div class="message-time" title="' + comingMessage.date + '">'+comingMessage.time+'</div>';
		    message += '</div>';
		    message += '<div class="message-body">';
		    message += comingMessage.content;
		    message += '</div>';
			message += '</li>';

			return message;
		}
		checkContact(contact, users){

			let participants = $(contact).data('participants');
			participants = Array.from(Object.values(participants));
			let multiple = 0;

			for(let j = 0; j < participants.length; j++){
				let status = $(contact).find('.status');
				let statusClass = $(contact).find('.online-offline');

				if(users.includes(participants[j])){
					multiple++;
				}

				if(participants.length === 1 && multiple === 1){
					this.checkOnlineOfflineClasses(statusClass, status, 'online', 'online');
				}else if(multiple>=1){
					let content = multiple + ' users online';
					this.checkOnlineOfflineClasses(statusClass, status, 'online', content);
				}else{
					this.checkOnlineOfflineClasses(statusClass, status, 'offline', 'offline');
					
					
				}
			}
		}
		checkWhoIsOnline(){
			let users = this.onlineUsers;
			this.checkWhoIsOnlineInPublicChat(users);

			let contacts = $('.conversations').not('.publicChat');
			for(let i = 0; i<contacts.length; i++){
				this.checkContact(contacts[i], users);
			}
		}
		checkOnlineOfflineClasses(statusClass, status, className, content){
			
			statusClass.removeClass(this.classes[className])
			statusClass.addClass(className);
			status.html(content);
		}
		checkWhoIsOnlineInPublicChat(users){
			
			let onlineUsers = users.length - 1;
			let grammar = '';
			(onlineUsers==1)? grammar = 'user' : 'users';
			let publicChat = $('.publicChat').find('.online-offline');
			let publicStatus = $('.publicChat').find('.status');

			if(onlineUsers){
				publicChat.removeClass('offline')
				publicChat.addClass('online');
				publicStatus.html(onlineUsers + ' ' + grammar + ' online');
			}else{
				publicChat.removeClass('online')
				publicChat.addClass('offline');
				publicStatus.html('offline');
			}
		}
		searchConversationInDatabase(search, responseDiv){
	    	responseDiv.html('');
	    	let chat = this;
	        $.ajax({
	            type: 'GET',
	            url: '/admin/conversations/search-conversations-ajax',
	            data: {
	                search: search
	                },
	            success: function(response){
		        	if(response.status === 404){
		        		responseDiv.html(response.message);
	            		responseDiv.addClass('relativeDiv');

		        	}else{
		        		chat.buildSearchResults(response, responseDiv)
		        	}
	            },
	            error: function(response){
	                console.log('Something went wrong.');
	            }
	       });
	    }
	    buildSearchResults(response, responseDiv){
	    	let html = '<ul class="searchConversationsResults">';
				
	    	Object.keys(response).forEach(function(key){
	    		let conversation = response[key];
	    		html += '<li class="searchList" data-id=' + conversation.id + '>';
	    		html += conversation.name;
	    		if(conversation.messageContent){
	    			html += '<p class="searchMessageContent"> - ';
	    			html += conversation.messageContent + '</p>';
	    		}
	    		html += '</li>';
	    	});
	    	html += '</ul>';

	    	responseDiv.html(html);
	    	responseDiv.addClass('relativeDiv');
	    }
	    checkNotifications(){
	    	let chatNotifications = $('.chatNotification');
	    	let notificationsNumber = 0;

	    	$('.chatNotification').each(function(index, notification){
	    		if($(this).html()!=''){
	    			notificationsNumber++;
	    		}
	    	});
	    	if(notificationsNumber){
	    		$('#notificationsNumber').html(notificationsNumber);
	    		$('#chat-link').addClass('wave in');
	    	}else{

	    		$('#notificationsNumber').html('');
	    		$('#chat-link').removeClass('wave in');

	    	}
	    }
	}

	let Conversation = new Chat();
    Conversation.checkNotifications();

	// public channel
	window.Echo.channel('publicChat')
		.listen('PublicMessageSent', e=>Conversation.appendNewMessage(e, $('#messages-list-' + e.conversationId)));

	// presence channel
	window.Echo.join('presentUsers')
		.here(users=>{
			users = users.map(a => a.name);
			Conversation.onlineUsers = users;
			Conversation.checkWhoIsOnline();
			window.users = users;
		})
		.joining(user=>{
			if(!Conversation.onlineUsers.includes(user.name)){
				Conversation.onlineUsers.push(user.name);
			}
			Conversation.checkWhoIsOnline();

		}).
		leaving(user=>{
			Conversation.onlineUsers.splice(Conversation.onlineUsers.indexOf(user.name), 1);
			Conversation.checkWhoIsOnline();
		});

	// private channels
	let privateConversations = Conversation.takeConversationsIds();
	for(let i = 0; i<privateConversations.length; i++){
		window.Echo.private('privateMessage.'+privateConversations[i])
			.listen('PrivateMessageSent', e=>Conversation.appendNewMessage(e, $('#messages-list-'+privateConversations[i])))
			.listenForWhisper('typing', e=>Conversation.showWhoIsTyping(e));
	}

	window.Echo.private('newConversationCreated.' + window.User.id)
		.listen('ConversationCreated', e=>{
			Conversation.addAndOpenNewConversation(e.data)
		});

	// get histories
	$('.publicChat').on('click', function(){
		$('#chatbar-messages').html('');
		let conversation = $(this).data('conversation');
		let publicChat = true;
		Conversation.getConversationHistory(conversation, publicChat);
	});

	//private chats
	$('.contact').not('.publicChat').on('click', function(){
		$('#chatbar-messages').html('');
		let conversation = $(this).data('conversation');
		
		Conversation.getConversationHistory(conversation);
	});

	// //add new conversation
	$("#addConversationButton").on('click', function () {
		$.ajaxSetup({
		    headers:
		    { 'X-CSRF-TOKEN': this.csrf }
		});
		$.ajax({
		    type: 'GET',
		    url: '/admin/conversations/addConversation',
		    success: function(response){
		       	Conversation.callNewConversationModal(response);
		    },
		    error: function(response){
		       console.log('Error.')
		    }
		});
	});

	//search
	$('#search_conversations').keyup($.debounce(700, function (e) {
		
		let search = $('#search_conversations').val();
		let responseDiv = $('#searchConversationsResults');

        if(search!='' && search.length>3){
	        Conversation.searchConversationInDatabase(search, responseDiv);
        }else{
            responseDiv.html('');
            responseDiv.removeClass('relativeDiv');
        }
    }));

    $('#searchConversationsResults').on('click', '.searchList', function(){
    	let conversation = $(this).data('id');
    	let responseDiv = $('#searchConversationsResults');
    	responseDiv.html('');
    	responseDiv.removeClass('relativeDiv');
    	$('#chatbar-messages').html('');
    	Conversation.getConversationHistory(conversation);
    	$('.page-chatbar .chatbar-contacts').hide();
        $('.page-chatbar .chatbar-messages').show();
    });
});