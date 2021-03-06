@if ($categories)
    <ul class="list-group" {{(isset($nestedTable)) ? "style=margin-left:50px;margin-bottom:0" : null}}>
        @foreach ($categories as $category)
            @if ( $category->isRoot())
                <li class="list-group-item">
                    {{$category->name}} 
                    <span class="pull-right">
                        <a href="{{ route('category.show', [ $category->getKey() ]) }}" class="btn btn-info btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Show
                         </a>
                        <a href="{{ route('category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn btn-success btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Create Child
                         </a>
                         <a href="{{ route('category.edit', [ $category->getKey() ]) }}" class="btn btn-warning btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Edit
                         </a>
                     </span>
                 </li>
            @else
                 <li class="list-group-item">
                    {{$category->name}} 
                    <span class="pull-right">
                        <a href="{{ route('category.show', [ $category->getKey() ]) }}" class="btn btn-info btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Show
                         </a>
                        <a href="{{ route('category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn btn-success btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Create Child
                         </a>
                         <a href="{{ route('category.edit', [ $category->getKey() ]) }}" class="btn btn-warning btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Edit
                         </a>
                     </span>
                 </li>
            @endif
            @include('categories.partials.tree', [ 'categories' => $category->children, 'nestedTable'=>true ])
        @endforeach
    </ul>
@endif


{{-- 
@if ($categories)
    <ul style="font-size: 13px;">
        @foreach ($categories as $category)
            
            @if ( $category->isRoot())
                <li style="list-style-type: disc;">
                    {{$category->name}}
                    <a href="{{ route('category.edit', [ $category->getKey() ]) }}" class="btn fa fa-fw fa-pencil"  title="Edit category"> </a>
                    <a href="{{ route('category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn fa fa-fw fa-plus"  title="Create child"></a>
                    <a href="{{ route('category.show', [ $category->getKey() ]) }}" class="btn fa fa-eye fa-fw"  title="Show category"> </a>
                </li>
            @else 
                <li style="list-style: circle;" >
                    {{$category->name}}
                    <a href="{{ route('category.edit', [ $category->getKey() ]) }}" class="btn fa fa-fw fa-pencil"  title="Edit category"> </a>
                    <a href="{{ route('category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn fa fa-fw fa-plus"  title="Create child"></a>
                    <a href="{{ route('category.show', [ $category->getKey() ]) }}" class="btn fa fa-eye fa-fw"  title="Show category"> </a>
                </li>
            @endif

            @include('categories.partials.tree', [ 'categories' => $category->children ])
            
        @endforeach
    </ul>
@endif
 --}}
