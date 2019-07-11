<input type="hidden" id="currentUser" value="{{Auth::user()->name}}">
<div class="messages-contact conversations @if($conversation->public) publicChat @endif" id="messages-contact" data-participants="{{$conversation->interlocutors->pluck('name')}}">
    <div class="contact-avatar">
        <img src="{{$conversation->image}}">
    </div>
    <div class="contact-info">
        <div id="contact-name" class="contact-name">{{$conversation->title}}</div>
         <div>
            <a class="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                <i class="icon fa fa-gear"></i>
            </a>
            <!--Tasks Dropdown-->
            <ul class="pull-left dropdown-menu dropdown-tasks dropdown-arrow conversationOptions">
                <li class="dropdown-header bordered-darkorange">
                    <i class="fa fa-gear"></i>
                    Options
                </li>
                @if(!$conversation->public)
                    <li id="changeName">
                        <button class="btn btn-default btn-block">
                            <i class="fa fa-pencil"></i>
                            Change Name
                        </button>
                    </li>
                    <li id="addNewParticipant">
                        <button class="btn btn-success btn-block">
                            <i class="fa fa-user-plus"></i>
                            Add New Participant
                        </button>
                    </li>
                @endif
                <li class="seeParticipants">
                    <button class="btn btn-info btn-block">
                        <i class="fa fa-users"></i> 
                        See Participants
                    </button>
                </li>
                @if($conversation->user_id === Auth::user()->id && !$conversation->public)
                    <li id="removeFromConversation">
                        <button class="btn btn-warning btn-block">
                            <i class="fa fa-user-times"></i> 
                            Remove Participant
                        </button>
                    </li>
                @endif
                <br>
                @if(!$conversation->public)
                    <li class="dropdown-header bordered-darkorange">
                        <i class="fa fa-warning"></i>
                        Delete This Conversation?
                    </li>
                    <li>
                        {!! Form::open(array('url' => route('admin.conversations.delete', [$conversation->id]),'id'=>'deleteConversationForm', 'class' => 'deleteForm', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::button('<i class="fa fa-trash-o"></i> Delete Conversation', array('id'=>'confirmConversationDelete', 'class' => 'btn btn-danger btn-block','type' => 'submit')) !!}
                        {!! Form::close() !!}
                    </li>
                @endif
            </ul>
        </div>
        <div class="contact-status">
            <div class="online-offline"></div>
            <div class="status"></div>
        </div>
       
        <div class="last-chat-time">
            {{-- a moment ago --}}
        </div>
        <div class="back">
            <i class="fa fa-arrow-circle-left"></i>
        </div>
    </div>
</div>
<ul class="messages-list @if($conversation->public) publicMessages @endif" id="messages-list-{{$conversation->id}}">
    @if(count($messages))
        @php $authId = Auth::user()->id; @endphp
        @include('partials/chat/messages-list')
    @else
        <li class="message">Start conversation!</li>
    @endif
</ul>
<span class="typing" id="typing-{{$conversation->id}}"></span>
<div class="send-message">
    <span class="input-icon icon-right">
        <textarea id="message" name="message" rows="4" class="form-control" placeholder="Type your message"></textarea>
        <i class="fa fa-camera themeprimary"></i>
    </span>
</div>

<script id="slimscrollScript" src="/assets/js/slimscroll/jquery.slimscroll.js"></script>
<script id="historyScript">
    $('#message').on('keydown', function(e){
        @if(!$conversation->public)
            window.Echo.private('privateMessage.' + '{{$conversation->id}}')
            .whisper('typing', {
                content: $('#currentUser').val() + 'is typing...',
                conversation: '{{$conversation->id}}'
            });
        @endif
        
        if(e.which === 13){
            let message = $('#message').val();
            sendMessage(message);
        }
    });
   
    function sendMessage(message){
        if(message){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
            $.ajax({
                type: 'POST',
                url: '{{route("admin.conversations.sendMessage")}}',
                data: {
                    message: message,
                    conversation: '{{$conversation->id}}'
                },
                success: function(response){
                   appendNewMessage(response);
                },
                error: function(response){
                    console.log('Error.');
                    let message = response.responseJSON.errors.message[0];
                    notifyPresence('alert-warning', message);
                }
            });
        }
    }

    function appendNewMessage(response){

        let list = 
           @if($conversation->public) '.publicMessages'
           @else
               '#messages-list-'+'{{$conversation->id}}'
           @endif
       let message = JSON.parse(response);
       message = buildMessage(message.content, message.user, message.time);
       $(list).append(message);
       $('#notification-{{$conversation->id}}').html('');
       checkNotifications()
       $('#message').val('');
       $('.chatbar-messages .messages-list').slimscroll({ scrollBy: '400px' });
       $('#notification-'+'{{$conversation->id}}').hide();
    }

    function checkNotifications(){
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

    function buildMessage(content, user, time){
        
        let message = '<li class="message reply">';
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
    $('.page-chatbar .chatbar-contacts .contact').on('click', function (e) {
        $('.page-chatbar .chatbar-contacts').hide();
        $('.page-chatbar .chatbar-messages').show();
    });
     
    $('.page-chatbar .chatbar-messages .back').on('click', function (e) {
        $('.page-chatbar .chatbar-contacts').show();
        $('.page-chatbar .chatbar-messages').hide();
        
        $('#slimscrollScript').remove();
        $('#historyScript').remove();
    });
    
    $('.chatbar-messages .messages-list').slimscroll({
       position: position,
       size: '4px',
       color: themeprimary,
       height: $(window).height() - (250 + additionalHeight),
       start: 'bottom',
    });

    //scroll to he top and get older messages
    var paginatorUrl = '{{$next}}';
    list = $(".messages-list");
    list.scrollTop(list[0].scrollHeight);
    list.scroll(function(){
        if (list.scrollTop() == 0){
            $.ajax({
            url: paginatorUrl,
            data:{
                conversation: {{$conversation->id}}
            },
            success:function(response){
                paginatorUrl = response.next;
                list.prepend(response.view);
                list.scrollTop(30);
            }
            });
        }
    });

    function notifyPresence(notificationClass, message){
        let notification = $('.userPresence');
        notification.addClass(notificationClass);
        notification.find('.userPresenceContent').html(message)
        notification.css('visibility', 'visible');
        setTimeout(function(){
            notification.css('visibility', 'hidden');
        }, 2000);
    }

    $('.seeParticipants').on('click', function(){
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        $.ajax({
            type: 'GET',
            url: '{{route("admin.conversations.seeParticipants")}}',
            data: {
                conversation: '{{$conversation->id}}'
            },
            success: function(response){
               showParticipantsModal(response);
            },
            error: function(response){
                console.log('Error.');
            }
        });

    });
    
    function showParticipantsModal(response){
        let message = makeParticipantsList(response);
        bootbox.alert({
            title: "{{$conversation->name}} participants",
            message: message,
        })
    }

    function makeParticipantsList(response){
        html = '';
        Object.keys(response).forEach(function(key){
            html += `<div class="databox databox-graded">
                        <div class="databox-left no-padding">
                            <img src="${response[key].image}" style="width:65px; height:65px;">
                        </div>
                        <div class="databox-right padding-top-20">
                            <div class="databox-text darkgray">${response[key].name}</div>
                            <div class="databox-text darkgray">${response[key].level}</div>
                        </div>
                    </div>`;

        });

        return html;
    }

    $('#addNewParticipant').on('click', function(){
        $.ajax({
          url: '{{route("admin.conversations.addNewParticipants")}}',
          data: {conversation: '{{$conversation->id}}'},
          success: function(response){
            callAddParticipantModal(response);
          },
        });
    })

    $('#removeFromConversation').on('click', function(){
        $.ajax({
          url: '{{route("admin.conversations.removeParticipants")}}',
          data: {conversation: '{{$conversation->id}}'},
          success: function(response){
            callRemoveParticipantModal(response);
          },
        });
    })

    function callAddParticipantModal(body){
        bootbox.dialog({
            message: body,
            title: "Add New Participants",
            className: "modal-darkorange",
            buttons: {
                success: {
                    label: "Create",
                    className: "btn-success",
                    callback: function () {
                        storeNewParticipants();
                    }
                },
                "Cancel": {
                    className: "btn-danger",
                    callback: function () { }
                }
            }
        });
    }

    function callRemoveParticipantModal(body){
        bootbox.dialog({
            message: body,
            title: "Remove Participants",
            className: "modal-darkorange",
            buttons: {
                success: {
                    label: "Remove",
                    className: "btn-warning",
                    callback: function () {
                        removeParticipants();
                    }
                },
                "Cancel": {
                    className: "btn-danger",
                    callback: function () { }
                }
            }
        });
    }

    function storeNewParticipants(){
        let newParticipants = $('#addNewParticipants').val();

        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        $.ajax({
            type: 'POST',
            url: '{{route('admin.conversations.storeNewParticipants')}}',
            data: {
                conversation: '{{$conversation->id}}',
                participants: newParticipants
            },
            success: function(response){
                appendNewMessage(response);
            },
            error: function(response){
                console.log('Error.');
            }
        });
    }

    function removeParticipants(){
        let participants = $('#removeParticipants').val();

        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        $.ajax({
            type: 'POST',
            url: '{{route("admin.conversations.deleteParticipants")}}',
            data: {
                conversation: '{{$conversation->id}}',
                participants: participants
            },
            success: function(response){
                appendNewMessage(response);
            },
            error: function(response){
                console.log('Error.');
            }
        });
    }

    $('#changeName').on('click', function(){
        
        $.ajax({
          url: '{{route("admin.conversations.changeName")}}',
          data: {conversation: '{{$conversation->id}}'},
          success: function(response){
            callChangeNameModal(response);
          },
        });
    });

    function callChangeNameModal(body){
        bootbox.dialog({
            message: body,
            title: "Change Name",
            className: "modal-darkorange",
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        if($('#conversationNewName').length){
                            storeNewName();
                        }
                    }
                },
                "Cancel": {
                    className: "btn-danger",
                    callback: function () { }
                }
            }
        });
    }

    function storeNewName(){
        let name = $('#conversationNewName').val();

        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        $.ajax({
            type: 'POST',
            url: '{{route("admin.conversations.storeNewName")}}',
            data: {
                conversation: '{{$conversation->id}}',
                name: name
            },
            success: function(response){
                appendNewMessage(response);

                let name = JSON.parse(response).name;

                $('.conversation-'+'{{$conversation->id}}').find('.contact-name').html(name);
                $('#contact-name').html(name);
            },
            error: function(response){
                console.log('Error.');
            }
        });
    }

    $('#confirmConversationDelete').on('click', function (e) {
        e.preventDefault();
        
        bootbox.dialog({
            message: 'Are you sure you want to delete this conversation ?',
            title: "Delete Conversation",
            className: "modal-darkorange",
            buttons: {
                success: {
                    label: "Delete",
                    className: "btn-warning",
                    callback: function () {
                        $('#deleteConversationForm').submit();
                    }
                },
                "Cancel": {
                    className: "btn-danger",
                    callback: function () { }
                }
            }
        });
    });
</script>