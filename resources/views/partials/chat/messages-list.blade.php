@foreach($messages as $message)
    <li class="message @if ($authId === $message->id) reply @endif">
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