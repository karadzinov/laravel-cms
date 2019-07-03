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