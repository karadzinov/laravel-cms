@if ($categories)
    <ul class="list-group" {{(isset($nestedTable)) ? "style=margin-left:50px;margin-bottom:0" : null}}>
        @foreach ($categories as $category)
            @if ( $category->isRoot())
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
                         <span style='display:inline;'>
                             {!! Form::open(array('url' => route('admin.category.destroy', [$category->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'), 'style'=>'display:inline')) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-xs','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('categories.delete-category'), 'data-message' => trans('categories.confirm-delete'))) !!}
                            {!! Form::close() !!}
                         </span>
                     </span>
                 </li>
            @else
                 <li class="list-group-item">
                    {{$category->name}} 
                    <span class="pull-right">
                        <a href="{{ route('admin.category.show', [ $category->getKey() ]) }}" class="btn btn-info btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Show
                         </a>
                        <a href="{{ route('admin.category.create', [ 'parent_id' => $category->getKey() ]) }}" class="btn btn-success btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Create Child
                         </a>
                         <a href="{{ route('admin.category.edit', [ $category->getKey() ]) }}" class="btn btn-warning btn-xs edit">
                            <i class="fa fa-edit"></i>
                             Edit
                         </a>
                     </span>
                 </li>
            @endif
            @include('admin.categories.partials.tree', [ 'categories' => $category->children, 'nestedTable'=>true ])
        @endforeach
    </ul>
@endif
