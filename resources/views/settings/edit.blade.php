@extends('layouts.app')

@section('content')
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">{!! trans('settings.edit-settings') !!}</span>
            <div class="pull-right">
                @if ($settings)
                    <span class="pull-right">
                        <a href='/meta/settings' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left">
                            <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                            {{ trans('settings.back-to-settings') }}
                        </a>
                    </span>
                    
                @else 
                    <table class="table-sm">
                        <tr>
                            <td>
                                <a href='/meta/settings/create' cdata-toggle="tooltip"  class="btn btn-sm btn-success btn-block inline" data-placement="left">
                                {!! trans('settings.create-settings') !!}
                                </a>
                            </td>
                   </tr></table>
                @endif
            </div>
        </div>
        <div class="widget-body">
            {!! Form::open(array('action' => ['SettingsController@update', $settings->id], 'method' => 'PUT', 'role' => 'form', 'files'=> true, 'class' => 'needs-validation')) !!}
                    {!! csrf_field() !!}
                    
                <div class="row">         
                    {!! Form::label('settings-title', trans('forms.settings-title'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 15px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('title', $settings->title, array('id' => 'settings-title', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px; visibility: visible;', 'placeholder' => trans('forms.settings-title-ph'))) !!}
                        </div>
                        
                        {!! Form::label('main_url', trans('forms.settings-url'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('main_url', $settings->main_url, array('id' => 'main_url', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-url-ph'))) !!}
                        </div>
                    {{--  email --}}
                        {!! Form::label('email', trans('forms.settings-email'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('email', $settings->email, array('id' => 'email', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-email-ph'))) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                     
                        {!! Form::label('address', trans('forms.settings-address'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('address', $settings->address, array('id' => 'address', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-address-ph'))) !!}
                        </div>
                        
                        {!! Form::label('logo', trans('forms.settings-logo'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            <img src="/images/{{$settings->logo}}" style="max-width: 200px">
                            {!! Form::file('logo', null,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::label('meta_description', trans('forms.settings-meta-description'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('meta_description', $settings->meta_description, array('id' => 'meta_description', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-meta-description-ph'))) !!}
                        </div>
                        
                        {!! Form::label('meta_image', trans('forms.settings-meta-image'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('meta_image', $settings->meta_image, array('id' => 'meta_image', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-meta-image-ph'))) !!}
                        </div>
                        
                        {!! Form::label('meta_title', trans('forms.settings-meta-title'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('meta_title', $settings->meta_title, array('id' => 'meta_title', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-meta-title-ph'))) !!}
                        </div>
                        
                        {!! Form::label('instagram', trans('forms.settings-instagram'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('instagram', $settings->instagram, array('id' => 'instagram', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-instagram-ph'))) !!}
                        </div>
                        
                        {!! Form::label('twitter', trans('forms.settings-twitter'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('twitter', $settings->twitter, array('id' => 'twitter', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-twitter-ph'))) !!}
                        </div>
                        
                        {!! Form::label('facebook', trans('forms.settings-facebook'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('facebook', $settings->facebook, array('id' => 'facebook', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-facebook-ph'))) !!}
                        </div>
                        
                        {!! Form::label('linkedin', trans('forms.settings-linkedin'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('linkedin', $settings->linkedin, array('id' => 'linkedin', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-linkedin-ph'))) !!}
                        </div>
                        
                        {!! Form::label('ios_app', trans('forms.settings-ios-app'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('ios_app', $settings->ios_app, array('id' => 'ios_app', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-ios-app-ph'))) !!}
                        </div>
                        
                        {!! Form::label('android_app', trans('forms.settings-android-app'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('android_app', $settings->android_app, array('id' => 'android_app', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-android-app-ph'))) !!}
                        </div>
                        {!! Form::label('google_map', trans('forms.settings-google-map'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}

                        <div class="col-md-12">

                                <input type="text" id="searchmap" class="form-control">
                                <div id="map-canvas"></div>

                        </div>




                    <input type="hidden" id="lat" class="form-control" name="lat" value="{{ $settings->lat }}">
                    <input type="hidden" id="lng" class="form-control" name="lng" value="{{ $settings->lng }}">
                    
                </div>
                         {!! Form::button(trans('forms.edit_settings_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','style'=>'margin-top: 8px;', 'type' => 'submit',  )) !!}
            {!! Form::close() !!}
        </div>
    </div>      
@endsection


@section('footer_scripts')
    
    <!-- Google Maps -->
    <script>

        $(document).ready(function () {
            // Google Maps
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $settings->lat }}, lng: {{ $settings->lng }} },
                zoom: 10
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $settings->lat }}, lng: {{ $settings->lng }} },
                map: map,
                draggable: true
            });

            var input = document.getElementById('searchmap');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

            google.maps.event.addListener(searchBox, 'places_changed', function () {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(8);

            });

            google.maps.event.addListener(marker, 'position_changed', function () {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);
            });


            $("form").bind("keypress", function (e) {
                if (e.keyCode == 13) {
                    $("#searchmap").attr('value');
                    //add more buttons here
                    return false;
                }
            });

        });

    </script>
@endsection
