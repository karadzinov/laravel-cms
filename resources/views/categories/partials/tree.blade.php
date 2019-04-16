@if ($categories)
    <ul style="list-style: circle; font-size: 13px;">
        @foreach ($categories as $category)
        <li>
            {{$category->name}}
            <a href="{{ route('category.edit', [ $category->getKey() ]) }}" class="btn fa fa-fw fa-pencil"  title="Edit category"> </a>
            <a href="{{ route('category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn fa fa-fw fa-plus"  title="Create child"></a>
            <a href="{{ route('category.show', [ $category->getKey() ]) }}" class="btn fa fa-eye fa-fw"  title="Show category"> </a>
        

            @include('categories.partials.tree', [ 'categories' => $category->children ])
        </li>
        @endforeach
    </ul>
@endif
