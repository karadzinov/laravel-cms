<div class="messages-contact conversations" id="messages-contact" data-participants="{{$conversation->interlocutors->pluck('name')}}">
    <div class="contact-avatar">
        <img src="{{$conversation->image}}">
    </div>
    <div class="contact-info">
        <div id="contact-name" class="contact-name">{{$conversation->title}}</div>
         <div>
            <a class="dropdown-toggle" data-toggle="dropdown" title="Options" href="#">
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
                            Add New Participants
                        </button>
                    </li>
                    @if($conversation->user_id === Auth::user()->id)
                        <li id="removeFromConversation">
                            <button class="btn btn-warning btn-block">
                                <i class="fa fa-user-times"></i> 
                                Remove Participants
                            </button>
                        </li>
                    @endif
                @endif
                <li class="seeParticipants">
                    <button class="btn btn-info btn-block">
                        <i class="fa fa-users"></i> 
                        See Participants
                    </button>
                </li>
                <br>
                @if(!$conversation->public)
                    <li class="dropdown-header bordered-darkorange">
                        <i class="fa fa-warning"></i>
                        Delete This Conversation?
                    </li>
                    <li>
                        {!! Form::open(array('url' => route('admin.conversations.delete', [$conversationId]),'id'=>'deleteConversationForm', 'class' => 'deleteForm', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::button('<i class="fa fa-trash-o"></i> Delete Conversation', array('id'=>'confirmConversationDelete', 'class' => 'btn btn-danger btn-block','type' => 'submit')) !!}
                        {!! Form::close() !!}
                    </li>
                @endif
            </ul>
        </div>
        <div class="contact-status @if($conversation->public) publicChat @endif">
            <div class="online-offline"></div>
            <div class="status"></div>
        </div>
       
       {{--  <div class="last-chat-time">
            a moment ago
        </div> --}}
        <div class="back">
            <i class="fa fa-arrow-circle-left"></i>
        </div>
    </div>
</div>
<ul class="messages-list" id="messages-list-{{$conversationId}}">
    @if(count($messages))
        @php $authId = Auth::user()->id; @endphp
        @include('partials/chat/messages-list')
    @else
        <li class="message">Start conversation!</li>
    @endif
</ul>
<span class="typing" id="typing-{{$conversationId}}"></span>
<div class="send-message">
    <span class="input-icon icon-right">
        <textarea id="message" name="message" rows="4" class="form-control" placeholder="Type your message"></textarea>
        <i class="fa fa-camera themeprimary"></i>
    </span>
</div>

<script id="slimscrollScript" src="/assets/js/slimscroll/jquery.slimscroll.js"></script>
<script id="historyScript">
    var currentlyAuthenticatedUser = "{{Auth::user()->name}}";
    $('#message').on('keydown', function(e){
        @if(!$conversation->public)
            window.Echo.private('privateMessage.' + '{{$conversationId}}')
            .whisper('typing', {
                content: currentlyAuthenticatedUser + 'is typing...',
                conversation: '{{$conversationId}}'
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
                    conversation: '{{$conversationId}}'
                },
                success: function(response){
                   $('#message').val('');
                   $('.chatbar-messages .messages-list').slimscroll({ scrollBy: '400px' });
                },
                error: function(response){
                    if(response.status ===422){
                        let message = 'Message too long (max 250 characters).';
                        notify('alert-warning', message);

                    }
                    console.log('Error.');
                }
            });
        }
    }

    $('.page-chatbar .chatbar-contacts .contact').on('click', function (e) {
        $('.page-chatbar .chatbar-contacts').hide();
        $('.page-chatbar .chatbar-messages').show();
    });
     
    $('.page-chatbar .chatbar-messages .back').on('click', function (e) {
        $('.page-chatbar .chatbar-contacts').show();
        $('.page-chatbar .chatbar-messages').hide();
        
        $('#chatbar-messages').html('');
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

    //scroll to the top and get previous messages
    var paginatorUrl = '{{$next}}';
    list = $(".messages-list");
    list.scrollTop(list[0].scrollHeight);
    list.scroll(function(){
        if (list.scrollTop() == 0){
            $.ajax({
            url: paginatorUrl,
            data:{
                conversation: {{$conversationId}}
            },
            success:function(response){
                paginatorUrl = response.next;
                list.prepend(response.view);
                list.scrollTop(30);
            }
            });
        }
    });

    function notify(notificationClass, message){
        let notification = $('.flashNotification');
        let content = notification.find('.flashNotificationContent');

        if(content.html() == ''){
            notification.addClass(notificationClass);
            content.html(message)
            notification.css('visibility', 'visible');
            setTimeout(function(){
                content.html('')
                notification.css('visibility', 'hidden');
            }, 2000);
        }
    }

    $('.seeParticipants').on('click', function(){
        let publicChat = {{$conversation->public}}
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        $.ajax({
            type: 'GET',
            url: '{{route("admin.conversations.seeParticipants")}}',
            data: {
                conversation: '{{$conversationId}}',
                public: publicChat
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
        let body = makeParticipantsList(response);
        bootbox.alert({
            title: "{{$conversation->name}} participants",
            message: body,
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
                            <div class="badge badge-info graded pull-right">${response[key].messagesNumber} messages</div>
                            
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
          data: {conversation: '{{$conversationId}}'},
          success: function(response){
            callAddParticipantModal(response);
          },
        });
    })

    $('#removeFromConversation').on('click', function(){
        $.ajax({
          url: '{{route("admin.conversations.removeParticipants")}}',
          data: {conversation: '{{$conversationId}}'},
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
                conversation: '{{$conversationId}}',
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
                conversation: '{{$conversationId}}',
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
          data: {conversation: '{{$conversationId}}'},
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
                conversation: '{{$conversationId}}',
                name: name
            },
            success: function(response){
                appendNewMessage(response);

                let name = JSON.parse(response).name;

                $('.conversation-'+'{{$conversationId}}').find('.contact-name').html(name);
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