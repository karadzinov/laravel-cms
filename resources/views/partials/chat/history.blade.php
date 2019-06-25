<div class="messages-contact" id="messages-contact">
    <div class="contact-avatar">
        <img src="{{-- @if ($messages[0]->profile && $messages[0]->profile->avatar_status == 1) {{ $messages[0]->profile->avatarThumbnail }} @else {{ Gravatar::get($messages[0]->email) }} @endif --}}">
    </div>
    <div class="contact-info">
        <div id="contact-name" class="contact-name">{{$conversation->name}}</div>
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
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 677px;">
    <ul class="messages-list" id="messages-list" style="overflow: hidden; width: auto; height: 677px;">
@if(count($messages))

        @php $authId = Auth::user()->id; @endphp
        @foreach($messages as $message)
            <li class="message @if ($authId !== $message->id) reply @endif">
                <div class="message-info">
                    <div class="bullet"></div>
                    <div class="contact-name">{{$message->name}}</div>
                    <div class="message-time">{{$message->pivot->created_at->diffForHumans()}}</div>
                </div>
                <div class="message-body">
                    {{$message->pivot->message}}
                </div>
            </li>
        @endforeach
    </ul>
    <div class="slimScrollBar" style="background: rgb(45, 195, 232); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;"></div>
    <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;">
    </div>
</div>
@else
    <p>Start conversation!</p>
@endif
<div class="send-message">
    <form id="chatForm" action="admin/sendmessage" method="POST">
        <span class="input-icon icon-right">
            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Type your message"></textarea>
            <i class="fa fa-camera themeprimary"></i>
            <input type="submit" value="send">
        </span>
    </form>
</div>

<script>
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
            message: $('#message').val(),
            conversationId: '{{$conversation->id}}'
        },
        success: function(response){
            let message = JSON.parse(response);
            message = buildMessage(message.content, message.user, message.time);
            $('#messages-list').append(message);
            $('#message').val('');
        },
        error: function(response){
            console.log('Error.');              }
   });
});

// window.Echo.private('privateChat.'+'{{$conversation->id}}').listen('PrivateMessageSent', e=>{
//     alert('private');
//     let message = e.message;
//     message = buildMessage(message.content, message.user, message.time, ' replay');
    
//     $('#messages-list').append(message);
    
// })
</script>