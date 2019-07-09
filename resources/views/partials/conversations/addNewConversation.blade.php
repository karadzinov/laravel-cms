<div id="addNewConversation">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="convesationName"><h6>Conversation Name</h6></label>
                <input id="conversationName" type="text" class="form-control" placeholder="Conversation Name" required="">
            </div>
            <div class="form-group">
                <label for="selectUsers"><h6>Select Interlocutor</h6></label>
                <select id="selectUsers" multiple="multiple" style="width: 100%;" required="">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="newConversationMessage"><h6>Message</h6></label>
                <textarea id="newConversationMessage" class="form-control" placeholder="Message" rows="5" required=""></textarea>
            </div>
        </div>
    </div>
</div>

<script>
    $("#selectUsers").select2({
        placeholder: "Select Interlocutors",
        allowClear: true
    })
</script>