@extends('layouts.app')
@section('head')
    <style>
        .tab-pane .row {
            padding-right: 10px;
            padding-left: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                <i class="fa fa-user"></i> {{ $user->name }}'s Profile
            </h1>
        </div>
        <!--Header Buttons-->
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
        <!--Header Buttons End-->
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-container">
                    <div class="profile-header row">
                        <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                            <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatarThumbnail }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" alt="" class="header-avatar">
                        </div>
                        <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                            <div class="header-fullname">
                                {{ $user->name }}
                                <br>
                                <div>
                                    ({{$user->first_name}}
                                    {{$user->last_name}})
                                </div>
                            </div>
                            @if ($user->profile)
                                @if (Auth::user()->id == $user->id)
                                    <a href="{{'/profile/'.Auth::user()->name.'/edit'}}" class="btn btn-warning pull-right">
                                        <i class="fa fa-edit"></i>
                                        {{trans('titles.editProfile')}}
                                    </a>
                                @endif
                            @else

                                <p>{{ trans('profile.noProfileYet') }}</p>
                                {!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}

                            @endif

                            <div class="header-information">
                                @if ($user->profile)
                                    <p>{{$user->profile->bio}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                            <div class="row">
                                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 stats-col">
                                    <div class="stats-value pink">{{ trans('profile.showProfileEmail') }}</div>
                                    <div class="stats-title">{{$user->email}}</div>
                                </div>
                                @if ($user->profile)
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 stats-col">
                                        <div class="stats-value pink">{{ trans('profile.showProfileTheme') }}</div>
                                        <div class="stats-title">{{ $currentTheme->name }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- body --}}
                        <div class="profile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                            <li class="active">
                                                <a data-toggle="tab" href="#edit-profile-tab" aria-expanded="true">
                                                    Profile Settings
                                                </a>
                                            </li>
                                            <li class="tab-palegreen">
                                                <a data-toggle="tab" href="#edit-settings-tab" aria-expanded="true">
                                                    Settings
                                                </a>
                                            </li>
                                            <li class="tab-red">
                                                <a data-toggle="tab" href="#edit-account-tab" aria-expanded="true">
                                                    Account
                                                </a>
                                            </li>
                                        </ul>
                                        {{-- tabs content --}}
                                        <div class="tab-content tabs-flat">
                                            <div id="edit-profile-tab" class="tab-pane active">
                                                <div class="row edit-profile-tab">
                                                        <div class="col-md-12">
                                                            @include('admin/profiles/partials/edit-profile-tab')

                                                        </div>
                                                </div>
                                            </div>

                                            <div id="edit-settings-tab" class="tab-pane">
                                                <div class="row edit-profile-tab">
                                                        <div class="col-md-12">
                                                            @include('admin/profiles/partials/edit-settings-tab')

                                                        </div>
                                                </div>
                                            </div>

                                            <div id="edit-account-tab" class="tab-pane">
                                                <div class="row edit-profile-tab">
                                                        <div class="col-md-12">
                                                            @include('admin/profiles/partials/edit-account-tab')

                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    @include('modals.modal-form')

@endsection

@section('footer_scripts')

    @include('scripts.form-modal-script')

    @if(config('settings.googleMapsAPIStatus'))
        @include('scripts.gmaps-address-lookup-api3')
    @endif

    @include('scripts.user-avatar-dz')

    <script type="text/javascript">
        $('#checked').hide();
        $('.dropdown-menu li a').click(function() {
            $('.dropdown-menu li').removeClass('active');
        });

        $('.profile-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-default');
        });

        $('.settings-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-info');
        });

        $('.admin-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-warning');
            $('.edit_account .nav-pills li, .edit_account .tab-pane').removeClass('active');
            $('#changepw')
                .addClass('active')
                .addClass('in');
            $('.change-pw').addClass('active');
        });

        $('.warning-pill-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-warning');
        });

        $('.danger-pill-trigger').click(function() {
            $('.panel').alterClass('card-*', 'card-danger');
        });

        $('#user_basics_form').on('keyup change', 'input, select, textarea', function(){
            $('#account_save_trigger').attr('disabled', false).removeClass('disabled').show();
        });

        $('#user_profile_form').on('keyup change', 'input, select, textarea', function(){
            $('#confirmFormSave').attr('disabled', false).removeClass('disabled').show();
        });

        $('#checkConfirmDelete').change(function() {
            var submitDelete = $('#delete_account_trigger');
            var self = $(this);
            if (self.is(':checked')) {
                submitDelete.attr('disabled', false);
                $('#checked').show();
                $('#unchecked').hide();
            }
            else {
                submitDelete.attr('disabled', true);
                $('#unchecked').show();
                $('#checked').hide();
            }
        });

        $("#password_confirmation").keyup(function() {
            checkPasswordMatch();
        });

        $("#password, #password_confirmation").keyup(function() {
            enableSubmitPWCheck();
        });

        $('#password, #password_confirmation').hidePassword(true);

        $('#password').password({
            shortPass: 'The password is too short',
            badPass: 'Weak - Try combining letters & numbers',
            goodPass: 'Medium - Try using special charecters',
            strongPass: 'Strong password',
            containsUsername: 'The password contains the username',
            enterPass: false,
            showPercent: false,
            showText: true,
            animate: true,
            animateSpeed: 50,
            username: false, // select the username field (selector or jQuery instance) for better password checks
            usernamePartialMatch: true,
            minimumLength: 6
        });

        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            if (password != confirmPassword) {
                $("#pw_status").html("Passwords do not match!");
            }
            else {
                $("#pw_status").html("Passwords match.");
            }
        }

        function enableSubmitPWCheck() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            var submitChange = $('#pw_save_trigger');
            if (password != confirmPassword) {
                submitChange.attr('disabled', true);
            }
            else {
                submitChange.attr('disabled', false);
            }
        }

    </script>

@endsection
