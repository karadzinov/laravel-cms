@extends('layouts.app')

@section('template_fastload_css')

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

@endsection

@section('content')

	<div class="page-header position-relative">
        <div class="header-title">
            <h1>
                {{ $user->name }}'s Profile
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
                            <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" alt="" class="header-avatar">
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
                        {{-- profile informations --}}
                        @if($user->profile)
                        {{-- twiter & github --}}
							@if($user->profile->twitter_username || $user->profile->github_username)
								<div class="col-md-12">
									<div class="form-title">
	                                    Networks
	                                </div>
									<div class="row"> 
										@if($user->profile->twitter_username)
									        <div class="col-sm-6">
									            <a href="{{'https://twitter.com/'.$user->profile->twitter_username}}" class="btn btn-default">
										            <i class="fa fa-twitter azure"></i>
										             {{$user->profile->twitter_username}}
									            </a>
									        </div>
								        @endif
								        @if($user->profile->github_username)
									        <div class="col-sm-6">
									            <a href="{{'https://github.com/'.$user->profile->github_username}}" class="btn btn-default">
										            <i class="fa fa-github black"></i>
										             {{$user->profile->github_username}}
									            </a>
									        </div>
								        @endif
								    </div>
								</div>
							@endif
							{{-- location --}}

							@if ($user->profile->location)
								<div class="col-md-12">
									<div class="form-title">
	                                    {{ trans('profile.showProfileLocation') }}
	                                </div>
									<div class="row">
										<div class="col-md-6">
											<p>
												{{ $user->profile->location }}
												@if(config('settings.googleMapsAPIStatus'))
													Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span> <br />

													<div id="map-canvas"></div>
												@endif
											</p>
										</div>
									</div>
								</div>
							@endif

                        @endif
                    </div>
    			</div>
    			
    		</div>
    	</div>
    </div>
@endsection

@section('footer_scripts')

	@if(config('settings.googleMapsAPIStatus'))
		@include('scripts.google-maps-geocode-and-map')
	@endif

@endsection
