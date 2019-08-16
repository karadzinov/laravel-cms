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
