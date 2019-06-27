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
    <ul class="messages-list" id="messages-list-{{$conversation->id}}">
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
@else
    <li class="message">Start conversation!</li>
@endif
    </ul>
<div class="send-message">
    <form id="chatForm" action="admin/sendmessage" method="POST">
        <span class="input-icon icon-right">
            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Type your message"></textarea>
            <i class="fa fa-camera themeprimary"></i>
            <input type="submit" value="send">
        </span>
    </form>
</div>

<script src="/assets/js/slimscroll/jquery.slimscroll.js"></script>
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
            $('#messages-list-'+'{{$conversation->id}}').append(message);
            $('#message').val('');
        },
        error: function(response){
            console.log('Error.');
        }
   });
});
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
</script>