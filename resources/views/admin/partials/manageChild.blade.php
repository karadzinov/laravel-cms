 <ul style="list-style: square; ">
@foreach($childs as $child)
	<li>
	<a href="/node/category/{{$child->id}}/edit"> {{ $child->name }}</a>   
	@if(count($child->childs))
            @include('admin/partials/manageChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>