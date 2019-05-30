{{-- Scripts --}}
<script src="{{mix('/js/mix.js')}}"></script>
<script src="{{mix('/js/app.js')}}"></script>
@if(config('settings.googleMapsAPIStatus'))
    {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
@endif