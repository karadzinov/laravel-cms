@php
	$depth = $depth ?? 1;
@endphp
	<div id="horizontal-form">
        <form class="form-horizontal" role="form">
            <div class="form-group">
@foreach($content as $key => $value)
                <label for="{{$key}}-{{$loop->iteration}}" class="col-sm-2 control-label no-padding-right">
                	{{$key}}
                </label>
                <div class="col-sm-10">
                	@if(is_array($value))
                	<div class="container-fluid parent-{{$key}} mb-40 child" data-parent='{{$key}}'>
                		@include('admin/partials/translations/items', ['content'=>$value, 'parent'=>$key, 'depth'=>$depth+1])
                	</div>
                </div>
                	@continue
                	@endif
                    <input data-name='{{$key}}' type="text" class="form-control translation-value depth-{{$depth}} @if($parent) parent-{{$parent}} @endif" id="{{$key}}-{{$loop->iteration}}" @if($parent) data-parent='{{$parent}}' @endif  value="{{$value}}" >
                </div>
            {{-- <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div> --}}
        
	{{-- <div class="col-md-1">
		<label class="control-label no-padding-left" for="">{{$key}}:</label>
	</div>
	<div class="col-md-11">
		
		@if(is_array($value))
			<div class="container-fluid parent-{{$key}}" data-parent='{{$key}}'>
				@include('admin/partials/translations/items', ['content'=>$value, 'parent'=>$key, 'depth'=>$depth+1])
			</div>
		</div> 

		@continue
		@endif

		<input data-name='{{$key}}' class="form-control translation-value depth-{{$depth}} @if($parent) parent-{{$parent}} @endif" @if($parent) data-parent='{{$parent}}' @endif type="text" value="{{$value}}">
	</div> --}}
@endforeach
            </div>

</form>
    </div>