<input type="hidden" id="currentUser" value="{{Auth::user()->name}}">
<div class="messages-contact" id="messages-contact">
    <div class="contact-avatar">
        <img src="{{$conversation->image}}">
    </div>
    <div class="contact-info">
        <div id="contact-name" class="contact-name">{{$conversation->name}}</div>
         <div>
            <a class="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                <i class="icon fa fa-gear"></i>
            </a>
            <!--Tasks Dropdown-->
            <ul class="pull-left dropdown-menu dropdown-tasks dropdown-arrow deleteConversation">
                <li class="dropdown-header bordered-darkorange">
                    <i class="fa fa-warning"></i>
                    Delete This Conversation?
                </li>
                <li>
                    {!! Form::open(array('url' => route('admin.conversations.delete', [$conversation->id]), 'class' => 'deleteForm', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i> Delete Conversation', array('class' => 'btn btn-danger btn-block','type' => 'submit', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Post', 'data-message' => 'Are you sure you want to delete this conversation ?')) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>
        <div class="contact-status">
            <div class="online"></div>
            <div class="status">online</div>
        </div>
       
        <div class="last-chat-time">
            a moment ago
        </div>
        <div class="back">
            <i class="fa fa-arrow-circle-left"></i>
        </div>
    </div>
</div>
<ul class="messages-list @if($conversation->public) publicMessages @endif" id="messages-list-{{$conversation->id}}">
    @if(count($messages))
        @php $authId = Auth::user()->id; @endphp
        @foreach($messages as $message)
            <li class="message @if ($authId === $message->user_id) reply @endif">
                <div class="message-info">
                    <div class="bullet"></div>
                    <div class="contact-name">{{$message->user->name}}</div>
                    <div class="message-time">{{$message->created_at->diffForHumans()}}</div>
                </div>
                <div class="message-body">
                    {{$message->content}}
                </div>
            </li>
        @endforeach
    @else
        <li class="message">Start conversation!</li>
    @endif
</ul>
<span id="typing"></span>
<div class="send-message">
    <span class="input-icon icon-right">
        <textarea id="message" name="message" rows="4" class="form-control" placeholder="Type your message"></textarea>
        <i class="fa fa-camera themeprimary"></i>
    </span>
</div>

<script src="/assets/js/slimscroll/jquery.slimscroll.js"></script>
<script>
    $('#message').on('keydown', function(e){
        @if(!$conversation->public)
            window.Echo.private('privateMessage.' + '{{$conversation->id}}')
            .whisper('typing', {
                content: $('#currentUser').val() + 'is typing...'
            });
        @endif
        
        if(e.which === 13){
            let message = $('#message').val();
            sendMessage(message);
        }
    });
   $('#message').on('keydown', function(e){
   });

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
       $('#message').val('');
       $('.chatbar-messages .messages-list').slimscroll({ scrollBy: '400px' });
       $('#notification-'+'{{$conversation->id}}').hide();

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
</script>