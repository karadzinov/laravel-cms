{{-- Scripts --}}
<script src="{{mix('/js/mix.js')}}"></script>
<script src="{{mix('/js/app.js')}}"></script>
@if(config('settings.googleMapsAPIStatus'))
    {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
@endif
 <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="{{asset('assets/js/select2/select2.js')}}"></script>

<script src="/js/chat.js"></script>