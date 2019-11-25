@extends('admin/master')
{{-- {{dd(\App::getLocale())}} --}}
@section('pageTitle')
    {{trans('products.products')}}
@endsection

@section('content')
    <div class="widget">
        
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-money"></i> 
            	{{trans('products.products')}}
            </span>
        </div>

        <div class="widget-body">
    		<a href="{{ route('admin.products.create') }}" class="btn btn-success btn-lg">
                <i class="fa fa-plus"></i> 
    	        {{trans('products.create-new')}}
    	    </a>

            @if($products->isNotEmpty())
                <div class="table-responsive users-table">
                    <table class="table table-striped table-sm data-table">
                        <caption id="user_count">
                            {{$products->count()}} {{trans('products.total')}}
                        </caption>
                        <thead class="thead">
                            <tr>
                                <th>{{trans('admin.id')}}</th>
                                <th>{{trans('admin.name')}}</th>
                                <th class="hidden-xs">
                                    {{trans('admin.category')}}
                                </th>
                                <th class="">
                                    {{trans('admin.price')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.reduction')}}
                                </th>
                                <th class="">
                                    {{trans('admin.reducted-price')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.active')}}
                                </th>
                                 <th class="hidden-xs hidden-md">
                                    {{trans('admin.delivery')}}
                                </th>
                                 <th class="hidden-xs hidden-md">
                                    {{trans('admin.author')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.created-at')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.updated-at')}}
                                </th>
                                <th>{{trans('admin.actions')}}</th>
                                <th></th>
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody id="users_table">
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{!!$product->name!!}</td>
                                    <td class="hidden-xs">{{$product->category->name}}</td>
                                    <td class="hidden-xs hidden-md">
                                        {{$product->formatedPrice . $settings->currencySymbol}}
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$product->reduction ?? 0}}%
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$product->formatedCurrentPrice . $settings->currencySymbol}}
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        @if($product->active)
                                            <span class="label label-success">
                                                {{trans('admin.active')}}
                                            </span>
                                        @else
                                            <span class="label label-danger">
                                                {{trans('admin.not-active')}}
                                            </span>
                                        @endif  
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        @if($product->delivery)
                                            <span class="label label-success">
                                                {{trans('admin.delivery')}}
                                            </span>
                                        @else
                                            <span class="label label-danger">
                                                {{trans('admin.without-delivery')}}
                                            </span>
                                        @endif  
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$product->author->name}}
                                    </td>                      
                                    <td class="hidden-xs hidden-md">
                                        {{$product->created_at->format('d-m-Y, H:i')}}
                                    </td>
                                     <td class="hidden-xs hidden-md">
                                        {{$product->updated_at->format('d-m-Y, H:i')}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.products.show', [$product->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
                                            <i class="fa fa-eye"></i> 
                                            {{trans('admin.show')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning btn-block" href="{{route('admin.products.edit', [$product->id])}}" data-toggle="tooltip" title="{{trans('admin.edit')}}">
                                            <i class="fa fa-edit"></i>
                                            {{trans('admin.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(array('url' => route('admin.products.delete', [$product->id]), 'class' => '', 'data-toggle' => 'tooltip', 'title' => trans('admin.delete'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::button('<i class="fa fa-trash-o"></i> '.trans('admin.delete'), array('class' => 'btn btn-danger btn-sm btn-block','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('products.delete'), 'data-message' => trans('products.confirm-delete'))) !!}
                                        {!! Form::close() !!}
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            {!!$products->links()!!}
        </div>
        
    </div>
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection
