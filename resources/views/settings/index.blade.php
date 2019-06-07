@extends('layouts.app')
@section('head')
    <style>
        .actionButton{
            margin: 2px 10px 0 0;
        }
    </style>
@endsection
@section('content')

    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-gear"></i> 
                {!! trans('settings.list-settings') !!}
            </span>
                @if (!$settings)
                    <a href='settings/create' cdata-toggle="tooltip"  class="btn btn-success inline" data-placement="left">
                        {!! trans('settings.create-settings') !!}
                    </a>
                @else 
                    <a class="btn btn-sm btn-warning pull-right actionButton" href="/meta/settings/1/edit"  data-toggle="tooltip" title="Edit">
                        {!! trans('settings.edit-settings') !!}
                    </a>
                    {!! Form::open(array('action' => ['SettingsController@destroy', $settings->id], 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button(trans('settings.delete-settings'), array('class' => 'pull-right btn btn-danger btn-sm actionButton','type' => 'button','data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Settings', 'data-message' => 'You want to delete Settings. Are you sure? ')) !!}
                    {!! Form::close() !!}
                @endif
        </div>
        <div class="widget-body">
            @if ($settings)        
                <div class="row" style="font-size: 13px">
                    
                    {!! Form::label('settings-title', trans('forms.settings-title'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 15px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('title', $settings->title, array('id' => 'settings-title', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>
                    {!! Form::label('main_url', trans('forms.settings-url'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                       {!! Form::text('main_url', $settings->main_url, array('class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>
                    {!! Form::label('email', trans('forms.settings-email'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('email', $settings->email, array('id' => 'email', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>    
                    {!! Form::label('address', trans('forms.settings-address'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('address', $settings->address,  array('class' => 'form-control','style'=>'font-size:14px; line-height:18px;' , 'readonly')) !!}
                    </div>
                    {!! Form::label('logo', trans('forms.settings-logo'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px" >
                        <img src="/images/settings/thumbnails/{{$settings->logo}}" style="max-width: 200px">  
                    </div>
                    {!! Form::label('meta_description', trans('forms.settings-meta-description'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('meta_description', $settings->meta_description, array('class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('meta_image', trans('forms.settings-meta-image'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('meta_image', $settings->meta_image, array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('meta_title', trans('forms.settings-meta-title'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('meta_title', $settings->meta_title, array('class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('instagram', trans('forms.settings-instagram'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('instagram', $settings->instagram, array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('twitter', trans('forms.settings-twitter'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('twitter', $settings->twitter, array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('facebook', trans('forms.settings-facebook'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('facebook', $settings->facebook,  array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('linkedin', trans('forms.settings-linkedin'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('linkedin', $settings->linkedin, array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('ios_app', trans('forms.settings-ios-app'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('ios_app', $settings->ios_app, array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly' )) !!}
                    </div>

                    {!! Form::label('android_app', trans('forms.settings-android-app'), array('class' => 'col-md-3 control-label', 'readonly', 'style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        {!! Form::text('android_app', $settings->android_app,  array( 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'readonly')) !!}
                    </div>

                    {!! Form::label('google_map', trans('forms.settings-google-map'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                    <div class="col-md-12"  style="font-size: 14px">
                        <div class="col-md-12"  style="font-size: 14px">
                            <div class="form-group">
                                <input type="text" id="searchmap" class="form-control">
                                <div id="map-canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('modals.modal-delete-settings')
@endsection

@section('footer_scripts')
    <!-- Google Maps -->
    @if ($settings)
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
    @endif

    @include('scripts.delete-modal-script')
@endsection
