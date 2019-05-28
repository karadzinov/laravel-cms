@extends('layouts.app')

@php
  $levelAmount = trans('usersmanagement.labelUserLevel');
  if ($user->level() >= 2) {
    $levelAmount = trans('usersmanagement.labelUserLevels');
  }
@endphp

@section('head')
  <style>
    .larger-text{
      font-size: 1.4em;
    }
  </style>
@endsection

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
                  <div class="">
                    ({{$user->first_name}}
                    {{$user->last_name}})
                  </div>
                </div>
                @if ($user->profile)

                  <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning pull-right" data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.editUser') }}">
                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> 
                    <span class="hidden-xs hidden-sm hidden-md"> 
                      {{ trans('usersmanagement.editUser') }} 
                    </span>
                  </a>

                  <a href="{{ url('/profile/'.$user->name) }}" class="btn btn-sm btn-info pull-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.viewProfile') }}">
                    <i class="fa fa-eye fa-fw" aria-hidden="true"></i> 
                    <span class="hidden-xs hidden-sm hidden-md">
                      {{ trans('usersmanagement.viewProfile') }}
                    </span>
                  </a>

                  {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('usersmanagement.deleteUser'))) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm pull-right','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')) !!}
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
                              {{ trans('usersmanagement.labelPermissions') }}
                            </div>
                            <div class="stats-title larger-text"> <br>
                              
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

                    @if ($user->name)
                      <div class="col-sm-5 col-6 text-larger">
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

                      <div class="col-sm-5 col-6">
                        <strong>
                          {{ trans('usersmanagement.labelEmail') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        <span data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.tooltips.email-user', ['user' => $user->email]) }}">
                          {{ HTML::mailto($user->email, $user->email) }}
                        </span>
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>
                    @endif

                    @if ($user->first_name)

                      <div class="col-sm-5 col-6 text-larger">
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

                      <div class="col-sm-5 col-6 text-larger">
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

                    <div class="col-sm-5 col-6 text-larger">
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

                    <div class="col-sm-5 col-6 text-larger">
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

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('usersmanagement.labelAccessLevel')}} {{ $levelAmount }}:
                      </strong>
                    </div>

                    <div class="col-sm-7">

                      @if($user->level() >= 5)
                        <span class="badge badge-primary margin-half margin-left-0">5</span>
                      @endif

                      @if($user->level() >= 4)
                         <span class="badge badge-info margin-half margin-left-0">4</span>
                      @endif

                      @if($user->level() >= 3)
                        <span class="badge badge-success margin-half margin-left-0">3</span>
                      @endif

                      @if($user->level() >= 2)
                        <span class="badge badge-warning margin-half margin-left-0">2</span>
                      @endif

                      @if($user->level() >= 1)
                        <span class="badge badge-default margin-half margin-left-0">1</span>
                      @endif
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    <div class="col-sm-5 col-6 text-larger">
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

                      <div class="col-sm-5 col-6 text-larger">
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
                      <div class="col-sm-5 col-6 text-larger">
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
                      <div class="col-sm-5 col-6 text-larger">
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
                      <div class="col-sm-5 col-6 text-larger">
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
                      <div class="col-sm-5 col-6 text-larger">
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
                      <div class="col-sm-5 col-6 text-larger">
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
                      <div class="col-sm-5 col-6 text-larger">
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

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
