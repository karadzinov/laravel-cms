@extends('layouts.app')
@section('head')
    <style>
        select{
            width:100%;
        }
    </style>
@endsection

@section('content')
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-gear"></i> 
                {!! trans('settings.edit-settings') !!}
            </span>
            <div class="pull-right">
                @if ($settings)
                    <span class="pull-right">
                        <a href='{{route('admin.settings.show')}}' class="btn btn-light float-right" data-toggle="tooltip" data-placement="left">
                            <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                            {{ trans('settings.back-to-settings') }}
                        </a>
                    </span>
                    
                @else 
                    <table class="table-sm">
                        <tr>
                            <td>
                                <a href='{{route('admin.settings.create')}}' cdata-toggle="tooltip"  class="btn btn-sm btn-success btn-block inline" data-placement="left">
                                {!! trans('settings.create-settings') !!}
                                </a>
                            </td>
                   </tr></table>
                @endif
            </div>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => 'admin.settings.update', 'method' => 'PUT', 'role' => 'form', 'files'=> true, 'class' => 'needs-validation')) !!}
                    {!! csrf_field() !!}
                    
                <div class="row">         
                    {!! Form::label('settings-title', trans('forms.settings-title'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 15px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('title', $settings->title, array('id' => 'settings-title', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px; visibility: visible;', 'placeholder' => trans('forms.settings-title-ph'))) !!}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('main_url', trans('forms.settings-url'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('main_url', $settings->main_url, array('id' => 'main_url', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-url-ph'))) !!}
                            @if ($errors->has('main_url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('main_url') }}</strong>
                                </span>
                            @endif
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
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        {!! Form::label('phone_number', trans('forms.settings-phone-number'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('phone_number', $settings->phone_number, array('id' => 'phone_number', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => 'Phone Number')) !!}
                            @if ($errors->has('phone_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('logo', trans('forms.settings-logo'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            <img src="/images/settings/thumbnails/{{$settings->logo}}" style="max-width: 200px">
                            {!! Form::file('logo', null,['class'=>'form-control']) !!}
                            @if ($errors->has('logo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                        </div>

                        {!! Form::label('slogan', trans('forms.settings-company-slogan'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('slogan', $settings->slogan, array('id' => 'slogan', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => 'Company Slogan')) !!}
                            @if ($errors->has('slogan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slogan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12"  style="font-size: 14px">

                            <div class="form-group">
                                {!! Form::label('languages', trans('forms.settings-languages-available') , array('class' => 'control-label')); !!}
                                {{Form::select('languages[]', 
                                    $languages, $avalilableLanguages,
                                    array('id'=>'languages', 'class'=>'form-control', 'multiple'=>'multiple'))}}
                            </div>
                        </div>

                        {!! Form::label('meta_description', trans('forms.settings-meta-description'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('meta_description', $settings->meta_description, array('id' => 'meta_description', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-meta-description-ph'))) !!}
                            @if ($errors->has('meta_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta_description') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('meta_image', trans('forms.settings-meta-image'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('meta_image', $settings->meta_image, array('id' => 'meta_image', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-meta-image-ph'))) !!}
                            @if ($errors->has('meta_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta_image') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('meta_title', trans('forms.settings-meta-title'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('meta_title', $settings->meta_title, array('id' => 'meta_title', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-meta-title-ph'))) !!}
                            @if ($errors->has('meta_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta_title') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('instagram', trans('forms.settings-instagram'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('instagram', $settings->instagram, array('id' => 'instagram', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-instagram-ph'))) !!}
                            @if ($errors->has('instagram'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('twitter', trans('forms.settings-twitter'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('twitter', $settings->twitter, array('id' => 'twitter', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-twitter-ph'))) !!}
                            @if ($errors->has('twitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('facebook', trans('forms.settings-facebook'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('facebook', $settings->facebook, array('id' => 'facebook', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-facebook-ph'))) !!}
                            @if ($errors->has('facebook'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('linkedin', trans('forms.settings-linkedin'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('linkedin', $settings->linkedin, array('id' => 'linkedin', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-linkedin-ph'))) !!}
                            @if ($errors->has('linkedin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('ios_app', trans('forms.settings-ios-app'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('ios_app', $settings->ios_app, array('id' => 'ios_app', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-ios-app-ph'))) !!}
                            @if ($errors->has('ios_app'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ios_app') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {!! Form::label('android_app', trans('forms.settings-android-app'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}
                        <div class="col-md-12"  style="font-size: 14px">
                            {!! Form::text('android_app', $settings->android_app, array('id' => 'android_app', 'class' => 'form-control','style'=>'font-size:14px; line-height:18px;', 'placeholder' => trans('forms.settings-android-app-ph'))) !!}
                            @if ($errors->has('android_app'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('android_app') }}</strong>
                                </span>
                            @endif
                        </div>
                        {!! Form::label('google_map', trans('forms.settings-google-map'), array('class' => 'col-md-3 control-label','style'=>'margin-top: 8px;margin-bottom:0px;')); !!}

                        <div class="col-md-12">

                                <input type="text" id="searchmap" class="form-control">
                                <div id="map-canvas"></div>

                        </div>
                        @if ($errors->has('lat') || $errors->has('lng'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lat') }}</strong>
                                <strong>{{ $errors->first('lng') }}</strong>
                            </span>
                        @endif




                    <input type="hidden" id="lat" class="form-control" name="lat" value="{{ $settings->lat }}">
                    <input type="hidden" id="lng" class="form-control" name="lng" value="{{ $settings->lng }}">
                    
                </div>
                {!! Form::button(trans('settings.update-settings'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','style'=>'margin-top: 8px;', 'type' => 'submit',  )) !!}
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

        $("#languages").select2({
          tags: true
        });
    </script>

    </script>
@endsection
