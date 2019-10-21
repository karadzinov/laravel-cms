{{-- Scripts --}}
<script src="{{mix('js/admin-mix.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>
@if(config('settings.googleMapsAPIStatus'))
    {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
@endif
<script src="{{asset('assets/admin/js/select2/select2.min.js')}}"></script>
<script src="{{asset('/assets/common/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js')}}"></script>
<script src="{{asset('assets/admin/js/chat.js')}}"></script>

<script src="{{asset('assets/admin/js/admin-custom.js')}}"></script>