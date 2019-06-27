<li class="contact conversation-{{$conversation->id}}" data-conversation='{{$conversation->id}}'>
    <div class="contact-avatar">
        <img src="{{asset('assets/img/avatars/Nicolai-Larson.jpg')}}">
    </div>
    <div class="contact-info">
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