<ul class="account-admin-subnav nav nav-pills nav-justified margin-bottom-3 margin-top-1">
    <li class="nav-item bg-info">
        <a data-toggle="pill" href="#changepw" class="nav-link warning-pill-trigger text-white active" aria-selected="true">
            {{ trans('profile.changePwPill') }}
        </a>
    </li>
    <li class="nav-item bg-info">
        <a data-toggle="pill" href="#deleteAccount" class="nav-link danger-pill-trigger text-white">
            {{ trans('profile.deleteAccountPill') }}
        </a>
    </li>
</ul>
<div class="tab-content">

    <div id="changepw" class="tab-pane fade show active">

        <h3 class="margin-bottom-1 text-center text-warning">
            {{ trans('profile.changePwTitle') }}
        </h3>

        {!! Form::model($user, array('action' => array('ProfilesController@updateUserPassword', $user->id), 'method' => 'PUT', 'autocomplete' => 'new-password')) !!}

            <div class="pw-change-container margin-bottom-2">

                <div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
                    {!! Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
                    {!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                        <span id="pw_status"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9 offset-md-3">
                    {!! Form::button(
                        '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitPWButton'),
                         array(
                            'class'             => 'btn btn-warning',
                            'id'                => 'pw_save_trigger',
                            'disabled'          => true,
                            'type'              => 'button',
                            'data-submit'       => trans('profile.submitButton'),
                            'data-target'       => '#confirmForm',
                            'data-modalClass'   => 'modal-warning',
                            'data-toggle'       => 'modal',
                            'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                            'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
                    )) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>

    <div id="deleteAccount" class="tab-pane fade">
        <h3 class="margin-bottom-1 text-center text-danger">
            {{ trans('profile.deleteAccountTitle') }}
        </h3>
        <p class="margin-bottom-2 text-center">
            <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                {!!trans('profile.delete-account-warning')!!}
            <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
        </p>
        <hr>
        <div class="row">
            <div class="col-sm-6 offset-sm-3 margin-bottom-3 text-center">

                {!! Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')) !!}
                    
                    <div class="btn-group btn-group-vertical margin-bottom-2 custom-checkbox-fa">
                        <label class="btn no-shadow" for="checkConfirmDelete" >
                            <input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
                            <i id="unchecked" class="fa fa-square-o fa-fw fa-2x"></i>
                            <i id="checked" class="fa fa-check-square-o fa-fw fa-2x"></i>
                            <span class="margin-left-2"> {{trans('profile.confirm-delete-check')}}</span>
                        </label>
                    </div>

                    {!! Form::button(
                        '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
                        array(
                            'class'             => 'btn btn-block btn-danger',
                            'id'                => 'delete_account_trigger',
                            'disabled'          => true,
                            'type'              => 'button',
                            'data-toggle'       => 'modal',
                            'data-submit'       => trans('profile.deleteAccountBtnConfirm'),
                            'data-target'       => '#confirmForm',
                            'data-modalClass'   => 'modal-danger',
                            'data-title'        => trans('profile.deleteAccountConfirmTitle'),
                            'data-message'      => trans('profile.deleteAccountConfirmMsg')
                        )
                    ) !!}

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
