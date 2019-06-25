{{-- <li class="message">
    <div class="message-info">
        <div class="bullet"></div>
        <div class="contact-name">{{Auth::user()->name}}</div>
        <div class="message-time">{{now()}}</div>
    </div>
    <div class="message-body">
        {{$message}}
    </div>
</li>

 --}}
<li class="message">
    <div class="message-info">
        <div class="bullet"></div>
        <div class="contact-name">{{Auth::user()->name}}</div>
        <div class="message-time">10:14 AM, Today</div>
    </div>
    <div class="message-body">
        {{$message}}
    </div>
</li>