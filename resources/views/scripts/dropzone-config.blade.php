{{-- 
important!
put #submitForm on your main submit button and #main_form on its form
 --}}
<script src="{{{ config('settings.dropZoneJsCDN') }}}"></script>
<script>
    $('#submitForm').on('click', function(){
        $('#main_form').submit();
    })
</script>
<script>
    Dropzone.options.myDropzone= {
        url: '{{route('images.store')}}',
        autoProcessQueue: true,
        uploadMultiple: true,
        parallelUploads: 2,
        // maxFiles: 5,
        maxFilesize: 1, //mb
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        init: function() {
            dzClosure = this;

            @if(isset($model) && $model->images)
                @foreach($model->images as $image)
                    var mockFile = { name: "{{$image->name}}", size: 12345, type: 'image/jpeg' };
                    this.addFile.call(this, mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$model->thumbnailPath.$image->name}}");
                @endforeach
            @endif

            this.on("sending", function(data, xhr, formData) {
                formData.append("_token", '{{csrf_field()}}');
                formData.append("table", '{{$table}}');
            });
        },

        removedfile: function(file) {
            $.ajaxSetup({
                        headers:
                        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });
            $.ajax({
                type: 'POST',
                url: '{{route('images.delete')}}',
                data: {
                    name: file.name,
                    table: '{{$table}}',
                    model:  @if(isset($model)) 
                                '{{str_replace('\\', '\\\\', get_class($model))}}', 
                            @else 
                                null, 
                            @endif
                    id:     @if(isset($model)) 
                                '{{$model->id}}' 
                            @else 
                                null 
                            @endif
                    },
                success: function(response){
                    console.log('Image successfully deleted.')
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                error: function(response){
                    console.log('Error while deleting image.')
                }
           });
        }
    }
</script>