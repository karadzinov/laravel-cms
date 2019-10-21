{!!Form::hidden('id', $category->id)!!}
<div class="form-group">
    {!! Form::label('name', trans('admin.name')) !!}
    {!! Form::text('name', $category->name, [ 'class' => 'form-control']) !!}
    {!! $errors->first('name') !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', trans('categories.parent')) !!}
    {!! Form::select('parent_id', $categories, $category->parent_id, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('parent_id') !!}
</div>

<div class="form-group">
    {!! Form::label('image', trans('admin.image')) !!}
    @if($category->image)
        <div>
            <img src="{{$category->thumbnailPath}}" style="max-width: 200px">
            <br>
            <br>
        </div>
    @endif
    {!! Form::file('image', null, [ 'class' => 'form-control' ]) !!}
    {!! $errors->first('image') !!}
</div>

<div class="form-group">
    {!! Form::label('description', trans('admin.description')) !!}
    <span class="input-icon icon-right">
        {!! Form::textarea('description', $category->description, [ 'class' => 'form-control' ]) !!}
        <i class="fa fa-pencil darkorange"></i>
    </span>
    {!! $errors->first('description') !!}
</div>

<div class="form-group">
    {!! Form::label('link', trans('admin.link')) !!}
    <span class="input-icon icon-right">
        {!! Form::text('link', $category->link, [ 'class' => 'form-control' ]) !!}
        <i class="fa fa-external-link circular"></i>
    </span>
    {!! $errors->first('link') !!}
</div>