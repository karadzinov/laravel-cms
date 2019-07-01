<input type="hidden" id="userConversations" value="{{$conversations->pluck('id')}}">
<div id="chatbar" class="page-chatbar">
    <div class="chatbar-contacts" style="display: block;">
        <div class="contacts-search">
            <input type="text" class="searchinput" placeholder="Search Contacts">
            <i class="searchicon fa fa-search"></i>
            <div class="searchhelper">Search Your Contacts and Chat History</div>
        </div>
        <button class="btn btn-success btn-block" id="addConversationButton">
            <i class="fa fa-plus"></i> Add New Conversation
        </button>
        <ul class="contacts-list"  style="overflow: hidden; width: auto; height: 841px;">
            @foreach($conversations as $conversation)
                <li class="contact" data-conversation='{{$conversation->id}}' @if($conversation->public ) id="publicChat" @endif>
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
            @endforeach
        </ul>
    </div>
    <div class="chatbar-messages" id="chatbar-messages">
        {{-- messages-list --}}

        <div class="back">
            <i class="fa fa-arrow-circle-left"></i>
        </div>
    </div>
</div>

