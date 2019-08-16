<div class="form-group">
    <label for="removeParticipants"><h6>{{trans('chat.remove-participants')}}</h6></label>
    <select id="removeParticipants" multiple="multiple" style="width: 100%;" required="">
        @foreach($users as $user)
            <option value="{{$user->id}}">
                {{$user->name}}
            </option>
        @endforeach
    </select>
</div>

<script>
    $("#removeParticipants").select2({
        placeholder: "{{trans('chat.remove-participants')}}",
        allowClear: true
    })
</script>