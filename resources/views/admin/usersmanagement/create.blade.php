@extends('admin/master')

@section('pageTitle')
    {{trans('usersmanagement.usersmanagement')}}
@endsection

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption"><i class="fa fa-users"></i> 
                {!! trans('usersmanagement.create-new-user') !!}
            </span>
            <div class="pull-right">
                <a href="{{ route('admin.users') }}" class="btn btn-light float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {!! trans('usersmanagement.buttons.back-to-users') !!}
                </a>
            </div>
        </div>
        <div class="widget-body">
            {!! Form::open(array('route' => 'admin.users.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('email', trans('forms.create_user_label_email')); !!}
                            <span class="input-icon icon-right">
                                {!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))) !!}
                                <i class="fa fa-envelope-o"></i>
                            </span>
                        </div>
                    </div>


                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('name', trans('forms.create_user_label_username')); !!}
                            <span class="input-icon icon-right">
                                {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))) !!}
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('first_name', trans('forms.create_user_label_firstname')); !!}
                            <span class="input-icon icon-right">
                                {!! Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('last_name', trans('forms.create_user_label_lastname')); !!}
                            <span class="input-icon icon-right">
                                {!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('role', trans('forms.create_user_label_role')); !!}
                            <span class="input-icon icon-right">
                                 <select class="custom-select form-control" name="role" id="role">
                                    <option value="">{{ trans('forms.create_user_ph_role') }}</option>
                                    @if ($roles)
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('password', trans('forms.create_user_label_password')); !!}
                            <span class="input-icon icon-right">
                                {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'))) !!}
                                <i class="fa fa-fw fa-lock"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-10 offset-md-2">
                        <div class="form-group">
                            {!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation')); !!}
                            <span class="input-icon icon-right">
                                {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                                <i class="fa fa-fw fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    
                </div>
                {!! Form::button(trans('forms.create_user_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
