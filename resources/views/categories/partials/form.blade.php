<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, [ 'class' => 'form-control', 'autofocus' => true ]) !!}
    {!! $errors->first('name') !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', 'Parent:') !!}
    {!! Form::select('parent_id', $categories, null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('parent_id') !!}
</div>