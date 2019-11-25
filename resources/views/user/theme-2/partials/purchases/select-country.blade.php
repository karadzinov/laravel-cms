<select class="form-control" name="{{$fieldName}}">
	@foreach($countries as $code => $name)
		<option value="{{ $code }}">{{ $name }}</option>
	@endforeach
</select>