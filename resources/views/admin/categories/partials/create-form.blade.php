<div class="form-group">
    {!! Form::label('name', trans('admin.name')) !!}
    {!! Form::text('name', null, [ 'class' => 'form-control', 'autofocus' => true ]) !!}
    {!! $errors->first('name') !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', trans('categories.parent')) !!}
    {!! Form::select('parent_id', $categories, $data, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('parent_id') !!}
</div>

<div class="form-group">
    {!! Form::label('image', trans('admin.image')) !!}
    {!! Form::file('image', null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('image') !!}
</div>

<div class="form-group">
    {!! Form::label('description', trans('admin.description')) !!}
    <span class="input-icon icon-right">
    	{!! Form::textarea('description', null, [ 'class' => 'form-control' ]) !!}
	    <i class="fa fa-pencil darkorange"></i>
	</span>
    {!! $errors->first('description') !!}
</div>

<div class="form-group">
    {!! Form::label('link', trans('admin.link')) !!}
    <span class="input-icon icon-right">
        {!! Form::text('link', null, [ 'class' => 'form-control' ]) !!}
        <i class="fa fa-external-link circular"></i>
    </span>
    {!! $errors->first('link') !!}
</div>