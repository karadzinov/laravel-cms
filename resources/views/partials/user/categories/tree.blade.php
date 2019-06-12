<ul class="dropdown-menu">
	@foreach($categories as $category)
		@if($category->children->isNotEmpty())
			<li class="dropdown ">
				<a  class="dropdown-toggle" data-toggle="dropdown" href="#">{{$category->name}}</a>
				@include('partials/user/categories/tree', ['categories'=> $category->children])
			</li>
		@else
			<li><a href="#">{{$category->name}}</a></li>
		@endif
	@endforeach
</ul>
