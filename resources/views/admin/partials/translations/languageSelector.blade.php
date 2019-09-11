<div id="addNewConversation">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="languageSelector"><h6>{{trans('translations.choose-language')}}</h6></label>
                <select id="languageSelector" multiple="multiple" style="width: 100%;" required="">
                    @foreach($languages as $language)
                        <option @if($language->active) selected @endif value="{{$language->id}}">
                            {{$language->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    $("#languageSelector").select2({
        {{-- placeholder: '{{trans('translations.choose-language')}}', --}}
        // allowClear: true,
        multiple: true
    })
</script>