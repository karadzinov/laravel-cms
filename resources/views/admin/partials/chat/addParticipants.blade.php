<div class="form-group">
    <label for="addNewParticipants"><h6>{{trans('chat.select-participants')}}</h6></label>
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
        placeholder: "{{trans('chat.add-new-participants')}}",
        allowClear: true
    })
</script>