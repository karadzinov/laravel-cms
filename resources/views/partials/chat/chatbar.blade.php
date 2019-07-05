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
                @include('partials/chat/contact')
            @endforeach
        </ul>
    </div>
    <div class="chatbar-messages" id="chatbar-messages">
        {{-- messages-list --}}
    </div>
</div>

