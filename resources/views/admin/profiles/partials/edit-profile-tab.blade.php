<div class="row mb-1">
    <div class="col-sm-12">
        <div id="avatar_container">
            <div class="collapseOne card-collapse collapse @if($user->profile->avatar_status == 0) show @endif">
                <div class="card-body">
                    <img src="{{  Gravatar::get($user->email) }}" alt="{{ $user->name }}" class="user-avatar">
                </div>
            </div>
            <div class="collapseTwo card-collapse collapse @if($user->profile->avatar_status == 1) show @endif">
                <div class="card-body">
                    <div class="dz-preview"></div>
                    {!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
                        <img id="user_selected_avatar" class="user-avatar" src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatarThumbnail }} @endif" alt="{{ $user->name }}">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name], 'id' => 'user_profile_form', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-10 offset-1 col-sm-10 offset-sm-1 mb-1">
            <div class="row" data-toggle="buttons">
                <div class="col-6 col-xs-6 right-btn-container">
                    <label class="btn btn-primary @if($user->profile->avatar_status == 0) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne:not(.show), .collapseTwo.show">
                        <input type="radio" name="avatar_status" id="option1" autocomplete="off" value="0" @if($user->profile->avatar_status == 0) checked @endif> {{trans('profile.use-gravatar')}}
                    </label>
                </div>
                <div class="col-6 col-xs-6 left-btn-container">
                    <label class="btn btn-primary @if($user->profile->avatar_status == 1) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne.show, .collapseTwo:not(.show)">
                        <input type="radio" name="avatar_status" id="option2" autocomplete="off" value="1" @if($user->profile->avatar_status == 1) checked @endif> {{trans('profile.use-my-image')}}
                    </label>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group has-feedback {{ $errors->has('location') ? ' has-error ' : '' }}">
        {!! Form::label('location', trans('profile.label-location') , array('class' => 'col-12 control-label')); !!}
        <div class="col-12">
            <span class="input-icon icon-right">
                {!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('profile.ph-location'))) !!}
                <i class="fa fa-globe blue"></i>
            </span>
            @if ($errors->has('location'))
                <span class="help-block">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group has-feedback {{ $errors->has('bio') ? ' has-error ' : '' }}">
        {!! Form::label('bio', trans('profile.label-bio') , array('class' => 'col-12 control-label')); !!}
        <div class="col-12">
            <span class="input-icon icon-right">
                 {!! Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-control', 'placeholder' => trans('profile.ph-bio'))) !!}
                <i class="fa fa-pencil darkorange"></i>
            </span>
            @if ($errors->has('bio'))
                <span class="help-block">
                    <strong>{{ $errors->first('bio') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group has-feedback {{ $errors->has('twitter_username') ? ' has-error ' : '' }}">
        {!! Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'col-12 control-label')); !!}
        <div class="col-12">
            <span class="input-icon icon-right">
                {!! Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-twitter_username'))) !!}
                <i class="fa fa-twitter azure"></i>
            </span>
            @if ($errors->has('twitter_username'))
                <span class="help-block">
                    <strong>{{ $errors->first('twitter_username') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="margin-bottom-2 form-group has-feedback {{ $errors->has('github_username') ? ' has-error ' : '' }}">
        {!! Form::label('github_username', trans('profile.label-github_username') , array('class' => 'col-12 control-label')); !!}
        <div class="col-12">
            <span class="input-icon icon-right">
                {!! Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-github_username'))) !!}
                <i class="fa fa-github darkblack"></i>
            </span>
            @if ($errors->has('github_username'))
                <span class="help-block">
                    <strong>{{ $errors->first('github_username') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group margin-bottom-2">
        <div class="col-12">
            {!! Form::button(
                '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
                 array(
                    'id'                => 'confirmFormSave',
                    'class'             => 'btn btn-success disabled',
                    'type'              => 'button',
                    'data-target'       => '#confirmForm',
                    'data-modalClass'   => 'modal-success',
                    'data-toggle'       => 'modal',
                    'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                    'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
            )) !!}

        </div>
    </div>
{!! Form::close() !!}
