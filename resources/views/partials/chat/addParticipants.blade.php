<div class="form-group">
    <label for="addNewParticipants"><h6>Select Participants</h6></label>
    <select id="addNewParticipants" multiple="multiple" style="width: 100%;" required="">
        @foreach($users as $user)
            <option value="{{$user->id}}">
                {{$user->name}}
            </option>
        @endforeach
    </select>
</div>

<script>
    $("#addNewParticipants").select2({
        placeholder: "Add New Participant",
        allowClear: true
    })
</script>