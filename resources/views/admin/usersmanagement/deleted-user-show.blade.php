@extends('layouts.app')

@section('head')
  <style>
    .larger-text{
      font-size: 1.4em;
    }
  </style>
@endsection

@php
    $levelAmount = 'Level:';
    if ($user->level() >= 2) {
        $levelAmount = 'Levels:';
    }
@endphp

@section('content')

      <div class="page-header position-relative text-white @if ($user->activated == 1) bg-success @else bg-danger @endif">
        <div class="header-title">
            <h1>
                <i class="fa fa-user"></i> {!! trans('usersmanagement.showing-user-title', ['name' => $user->name]) !!}
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
                  <img src="@if ($user->profile && $user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" alt="{{ $user->name }}" class="header-avatar">
                </div>

                <div class="col-lg-5 col-md-8 col-sm-12 profile-info larger-text">
                  <div class="header-fullname text-center">
                    {{ $user->name }}
                    <br>
                    <div>
                      ({{$user->first_name}}
                      {{$user->last_name}})
                    </div>
                  </div>
                  @if ($user->profile)

                    {!! Form::model($user, array('action' => array('Admin\SoftDeletesController@update', $user->id), 'method' => 'PUT', 'class' => 'form-inline')) !!}
                        {!! Form::button('<i class="fa fa-refresh fa-fw" aria-hidden="true"></i> Restore User', array('class' => 'pull-right btn btn-success btn-sm mt-1 mb-1', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')) !!}
                        {!! Form::close() !!}
                        {!! Form::model($user, array('action' => array('Admin\SoftDeletesController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'title' => 'Permanently Delete User')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button('<i class="fa fa-user-times fa-fw" aria-hidden="true"></i> Delete User', array('class' => 'pull-right btn btn-danger btn-sm ','type' => 'button' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Permanently Delete User', 'data-message' => 'Are you sure you want to permanently delete this user?')) !!}
                    {!! Form::close() !!}
                  @endif
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 stats-col">
                            <div class="stats-value pink">{{ trans('usersmanagement.labelRole') }}</div>
                            <div class="stats-title larger-text"> <br>
                                @foreach ($user->roles as $user_role)

                                  @if ($user_role->name == 'User')
                                    @php $badgeClass = 'primary' @endphp

                                  @elseif ($user_role->name == 'Admin')
                                    @php $badgeClass = 'warning' @endphp

                                  @elseif ($user_role->name == 'Unverified')
                                    @php $badgeClass = 'danger' @endphp

                                  @else
                                    @php $badgeClass = 'default' @endphp

                                  @endif

                                  <span class="badge badge-{{$badgeClass}}">{{ $user_role->name }}</span>

                                @endforeach  
                                
                            </div>
                        </div>
                        @if ($user->profile)
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 stats-col">
                              <div class="stats-value pink">
                                {{ trans('usersmanagement.labelDeletedAt') }}:
                              </div>
                              <div class="stats-title larger-text"> <br>
                                {{ $user->deleted_at->format('d-m-Y, H:i') }}
                              </div>
                          </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">

                  <div class="form-title">

                      Details

                  </div>

                  <div class="row"> 

                    <div class="col-sm-6 larger-text">
                      <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        @if ($user->deleted_at)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                    {{ trans('usersmanagement.labelDeletedAt') }}
                                </strong>
                            </div>
                            <div class="col-sm-7 text-warning">
                                {{ $user->deleted_at->format('d-m-Y, H:i') }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->deleted_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelIpDeleted') }}
                                </strong>
                            </div>
                            <div class="col-sm-7 text-warning">
                                {{ $user->deleted_ip_address }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->name)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelUserName') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $user->name }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->email)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelEmail') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ HTML::mailto($user->email, $user->email) }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->first_name)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelFirstName') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $user->first_name }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->last_name)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelLastName') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $user->last_name }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('usersmanagement.labelRole') }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @foreach ($user->roles as $user_role)
                                @if ($user_role->name == 'User')
                                    @php $badgeClass = 'primary' @endphp
                                @elseif ($user_role->name == 'Admin')
                                    @php $badgeClass = 'warning' @endphp
                                @elseif ($user_role->name == 'Unverified')
                                    @php $badgeClass = 'danger' @endphp
                                @else
                                    @php $badgeClass = 'default' @endphp
                                @endif
                                <span class="badge badge-{{$badgeClass}}">{{ $user_role->name }}</span>
                            @endforeach
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('usersmanagement.labelStatus') }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @if ($user->activated == 1)
                                <span class="badge badge-success">
                                    Activated
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Not-Activated
                                </span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('usersmanagement.labelAccessLevel')}} {{ $levelAmount }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @if($user->level() >= 5)
                                <span class="badge badge-primary margin-half ml-0">5</span>
                            @endif

                            @if($user->level() >= 4)
                                <span class="badge badge-info margin-half ml-0">4</span>
                            @endif

                            @if($user->level() >= 3)
                                <span class="badge badge-success margin-half ml-0">3</span>
                            @endif

                            @if($user->level() >= 2)
                                <span class="badge badge-warning margin-half ml-0">2</span>
                            @endif

                            @if($user->level() >= 1)
                                <span class="badge badge-default margin-half ml-0">1</span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('usersmanagement.labelPermissions') }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @if($user->canViewUsers())
                                <span class="badge badge-primary margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionView') }}
                                </span>
                            @endif

                            @if($user->canCreateUsers())
                                <span class="badge badge-info margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionCreate') }}
                                </span>
                            @endif

                            @if($user->canEditUsers())
                                <span class="badge badge-warning margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionEdit') }}
                                </span>
                            @endif

                            @if($user->canDeleteUsers())
                                <span class="badge badge-danger margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionDelete') }}
                                </span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        @if ($user->created_at)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelCreatedAt') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $user->created_at->format('d-m-Y, H:i') }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->updated_at)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelUpdatedAt') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $user->updated_at->format('d-m-Y, H:i') }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->signup_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelIpEmail') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $user->signup_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->signup_confirmation_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelIpConfirm') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $user->signup_confirmation_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->signup_sm_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelIpSocial') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $user->signup_sm_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>

                        @endif

                        @if ($user->admin_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelIpAdmin') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $user->admin_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($user->updated_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('usersmanagement.labelIpUpdate') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $user->updated_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>

                        @endif
                      <br>
                    </div>
                  </div>
                </div>

              </div>

            </div> {{-- /profile-container --}}
          </div>
        </div>
      </div>
      
    @include('modals.modal-delete')

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
    @include('scripts.tooltips')
@endsection
