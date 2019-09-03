<!-- JAVASCRIPT FILES -->
<script>var plugin_path = '{{asset('assets/theme-2/plugins/')}}/';</script>

<script src="{{mix('js/theme-2-mix.js')}}"></script>
<script src="{{asset('assets/theme-2/js/custom.js')}}"></script>

@if(config('settings.googleMapsAPIStatus'))
	<script src="//maps.googleapis.com/maps/api/js?key={{config("settings.googleMapsAPIKey")}}&libraries=places&dummy=.js"></script>
@endif
<script>
	if($('#map-canvas').length){
		let lat = parseFloat($('#lat').val());
		let lng = parseFloat($('#lng').val());
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			    center: {lat: lat, lng: lng },
			    zoom: 10
			});
		var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng },
            map: map,
            draggable: false
        });
	}
</script>
