@if ($categories)
    <ul class="list-group" {{(isset($nestedTable)) ? "style=margin-left:50px;margin-bottom:0" : null}}>
        @foreach ($categories as $category)
            @if ( $category->isRoot())
            <br> <br>
                <li class="list-group-item">
                    {{$category->name}} 
                    <span class="pull-right">
                        <a href="{{ route('admin.category.show', [ $category->getKey() ]) }}" class="btn btn-info btn-xs edit">
                            <i class="fa fa-eye"></i>
                             {{trans('admin.show')}}
                         </a>
                        <a href="{{ route('admin.category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn btn-success btn-xs edit">
                            <i class="fa fa-plus"></i>
                             {{trans('admin.create-child')}}
                         </a>
                         <a href="{{ route('admin.category.edit', [ $category->getKey() ]) }}" class="btn btn-warning btn-xs edit">
                            <i class="fa fa-edit"></i>
                             {{trans('admin.edit')}}
                         </a>
                     </span>
                 </li>
            @else
                 <li class="list-group-item">
                    {{$category->name}} 
                    <span class="pull-right">
                        <a href="{{ route('admin.category.show', [ $category->getKey() ]) }}" class="btn btn-info btn-xs edit">
                            <i class="fa fa-edit"></i>
                             {{trans('admin.show')}}
                         </a>
                        <a href="{{ route('admin.category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn btn-success btn-xs edit">
                            <i class="fa fa-edit"></i>
                             {{trans('admin.create-child')}}
                         </a>
                         <a href="{{ route('admin.category.edit', [ $category->getKey() ]) }}" class="btn btn-warning btn-xs edit">
                            <i class="fa fa-edit"></i>
                             {{trans('admin.edit')}}
                         </a>
                     </span>
                 </li>
            @endif
            @include('admin/categories/partials/tree', [ 'categories' => $category->children, 'nestedTable'=>true ])
        @endforeach
    </ul>
@endif
