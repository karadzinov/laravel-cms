<div id="chatbar" class="page-chatbar">
    <div class="chatbar-contacts" style="display: block;">
        <div class="contacts-search">
            <input type="text" class="searchinput" placeholder="Search Contacts">
            <i class="searchicon fa fa-search"></i>
            <div class="searchhelper">Search Your Contacts and Chat History</div>
        </div>
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 841px;">
            <ul class="contacts-list" style="overflow: hidden; width: auto; height: 841px;">
                <li class="contact" id="publicChat" >
                    <div class="contact-avatar">
                        <img src="{{asset('assets/img/logo-solo.png')}}">
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">Public Chat</div>
                        <div class="contact-status">
                            <div class="online"></div>
                            <div class="status">online</div>
                        </div>
                        <div class="last-chat-time">
                            last week
                        </div>
                    </div>
                </li>
                @foreach($conversations as $conversation)
                    <li class="contact" data-conversation='{{$conversation->id}}'>
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
            <div class="slimScrollBar" style="background: rgb(45, 195, 232); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 841px;">
                
            </div>
            <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;">
                
            </div>
        </div>
    </div>
    <div class="chatbar-messages" id="chatbar-messages" style="display: none;">
        {{-- messages-list --}}

        <div class="back">
            <i class="fa fa-arrow-circle-left"></i>
        </div>
    </div>
</div>