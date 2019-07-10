<li class="contact conversations conversation-{{$conversation->id}}" 
    data-conversation='{{$conversation->id}}'
    @if($conversation->public) id="publicChat" @endif
    data-participants="{{$conversation->interlocutors->pluck('name')}}">
    <div class="contact-avatar">
        <img src="{{$conversation->image}}">
    </div>
    <div class="contact-info">
        
        <span id="notification-{{$conversation->id}}" class="badge badge-danger">@if(count($conversation->messages) && !$conversation->messages->last()->seen()) new messages @endif</span>

        <div class="contact-name">{{$conversation->title}}</div>
        <div class="contact-status">
            <div class="online-offline"></div>
            <div class="status"></div>
        </div>
        <div class="last-chat-time">
            @if($conversation->messages()->count())
                {{$conversation->messages()->latest()->first()->created_at->diffForHumans()}}
            @endif
        </div>
    </div>
</li>