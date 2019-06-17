<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, [ 'class' => 'form-control', 'autofocus' => true ]) !!}
    {!! $errors->first('name') !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', 'Parent:') !!}
    {!! Form::select('parent_id', $categories, $data, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('parent_id') !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('image') !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <span class="input-icon icon-right">
    	{!! Form::textarea('description', null, [ 'class' => 'form-control' ]) !!}
	    <i class="fa fa-pencil darkorange"></i>
	</span>
    {!! $errors->first('description') !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    <span class="input-icon icon-right">
        {!! Form::text('link', null, [ 'class' => 'form-control' ]) !!}
        <i class="fa fa-external-link circular"></i>
    </span>
    {!! $errors->first('link') !!}
</div>