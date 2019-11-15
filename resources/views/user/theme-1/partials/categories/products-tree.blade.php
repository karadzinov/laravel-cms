@foreach($categories as $category)
	<option value="{{$category->id}}" @if(isset($request['category']) && $request['category']==$category->id) selected='selected' @endif>
		{{$category->name}}
	</option>
@endforeach

@foreach($products as $product) 
	@if($product->reduction)
		@include($path . 'partials/products/with-reduction')
	@else
		@include($path . 'partials/products/without-reduction')
	@endif
@endforeach

<ul class="dropdown-menu">
	@foreach($categories as $category)
		@if($category->children->isNotEmpty())
			<li class="dropdown ">
				<a  class="dropdown-toggle" data-toggle="dropdown" href="{{$category->showRoute}}">{{$category->name}}</a>
				@include($path . 'partials/categories/tree', ['categories'=> $category->children])
			</li>
		@else
			<li><a href="{{$category->showRoute}}">{{$category->name}}</a></li>
		@endif
	@endforeach
</ul>
