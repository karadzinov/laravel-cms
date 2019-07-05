<li class="contact conversation-{{$conversation->id}}" data-conversation='{{$conversation->id}}'>
    <div class="contact-avatar">
        <img src="{{$conversation->image}}">
    </div>
    <div class="contact-info">
        <span id="notification-{{$conversation->id}}" class="badge badge-danger">@if(count($conversation->messages) && !$conversation->messages->last()->seen()) new messages @endif
        </span>
        <div class="contact-name">{{$conversation->name}}</div>
        <div class="contact-status">
            <div class="offline"></div>
            <div class="status">left 4 mins ago</div>
        </div>
        <div class="last-chat-time">
            {{$conversation->latest()->first()->created_at->diffForHumans()}}
        </div>
    </div>
</li>