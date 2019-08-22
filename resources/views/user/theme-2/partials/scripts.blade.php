<!-- JAVASCRIPT FILES -->
<script>var plugin_path = '{{asset('assets/theme-2/plugins/')}}/';</script>
<script src="{{asset('assets/theme-2/plugins/jquery/jquery-3.3.1.min.js')}}"></script>

<!-- REVOLUTION SLIDER -->
<script src="{{asset('assets/theme-2/plugins/slider.revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('assets/theme-2/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('assets/theme-2/js/view/demo.revolution_slider.js')}}"></script>
<script src="{{asset('/assets/js/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js')}}"></script>
<!-- SCRIPTS -->
<script src="{{asset('assets/theme-2/js/scripts.js')}}"></script>

@if(config('settings.googleMapsAPIStatus'))
	<script src="//maps.googleapis.com/maps/api/js?key={{config("settings.googleMapsAPIKey")}}&libraries=places&dummy=.js"></script>
	<script>
		if($('#lat').val()){
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
@endif