<ul style="list-style: circle; font-size: 13px;">
    @foreach ($tree as $t )
        <li>
            {{$t->name}}
            @if($t->children) 
                @include('admin/categories/partials.path', [ 'tree' => $t->children ])
            @endif 
        </li>
    @endforeach
</ul>