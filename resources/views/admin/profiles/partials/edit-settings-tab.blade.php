{!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form')) !!}

    {!! csrf_field() !!}

    <div class="pt-4 pr-3 pl-2 form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
        {!! Form::label('name', trans('forms.create_user_label_username'), array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="form-group">
                <span class="input-icon icon-right">
                    {!! Form::text('name', $user->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))) !!}
                    <i class="glyphicon glyphicon-user circular"></i>
                </span>
            </div>
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
        {!! Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="form-group">
                <span class="input-icon icon-right">
                    {!! Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))) !!}
                    <i class="fa fa-envelope-o circular"></i>
                </span>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
        {!! Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="form-group">
                <span class="input-icon icon-right">
                    {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                    <i class="fa fa-user"></i>
                </span>
            </div>
            @if($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
        {!! Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
        <div class="col-md-9">
            <div class="form-group">
                <span class="input-icon icon-right">
                    {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                    <i class="fa fa-user"></i>
                </span>
            </div>
            @if($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-9 offset-md-3">
            {!! Form::button(
                '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitProfileButton'),
                 array(
                    'class'             => 'btn btn-success disabled',
                    'id'                => 'account_save_trigger',
                    'disabled'          => true,
                    'type'              => 'button',
                    'data-submit'       => trans('profile.submitProfileButton'),
                    'data-target'       => '#confirmForm',
                    'data-modalClass'   => 'modal-success',
                    'data-toggle'       => 'modal',
                    'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                    'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
            )) !!}
        </div>
    </div>
{!! Form::close() !!}
