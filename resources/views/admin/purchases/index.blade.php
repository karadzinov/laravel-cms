@extends('admin/master')

@section('pageTitle')
    {{trans('purchases.purchases')}}
@endsection

@section('content')
    <div class="widget">
        
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-shopping-cart"></i> 
            	{{trans('purchases.purchases')}}
            </span>
        </div>

        <div class="widget-body">
            @if($purchases->isNotEmpty())
                <div class="table-responsive users-table">
                    <table class="table table-striped table-sm data-table">
                        <caption id="user_count">
                            {{$purchases->count()}} {{trans('purchases.total')}}
                        </caption>
                        <thead class="thead">
                            <tr>
                                <th>{{trans('admin.id')}}</th>
                                <th>{{trans('admin.user')}}</th>
                                <th class="">
                                    {{trans('admin.completed')}}
                                </th>
                                 <th class="">
                                    {{trans('admin.status')}}
                                </th>
                                <th class="">
                                    {{trans('admin.ammount')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.phone')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.order-number')}}
                                </th>
                                 <th class="">
                                    {{trans('admin.transaction-id')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.created-at')}}
                                </th>
                                <th class="hidden-xs hidden-md">
                                    {{trans('admin.updated-at')}}
                                </th>
                                <th>{{trans('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody id="users_table">
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td>{{$purchase->id}}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/users/' . $purchase->user->id) }}">
                                            {{$purchase->user->name}}
                                        </a>
                                    </td>
                                    <td class="">
                                        @if($purchase->completed)
                                            <span class="label label-success">
                                                {{trans('admin.completed')}}
                                            </span>
                                        @else
                                            <span class="label label-danger">
                                                {{trans('admin.uncompleted')}}
                                            </span>
                                        @endif  
                                    </td>
                                    <td class="">
                                        {{$purchase->status}}
                                    </td>
                                    <td class="">
                                        {{$purchase->total . ' ' . $purchase->currency}}
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$purchase->phone}}
                                    </td>
                                    <td class="hidden-xs hidden-md">
                                        {{$purchase->order_number}}
                                    </td>
                                    <td class="">
                                        {{$purchase->transaction_id}}
                                    </td>                      
                                    <td class="hidden-xs hidden-md">
                                        {{$purchase->created_at->format('d-m-Y, H:i')}}
                                    </td>
                                     <td class="hidden-xs hidden-md">
                                        {{$purchase->updated_at->format('d-m-Y, H:i')}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info btn-block" href="{{ route('admin.purchases.show', [$purchase->id])}}" data-toggle="tooltip" title="{{trans('admin.show')}}">
                                            <i class="fa fa-eye"></i> 
                                            {{trans('admin.show')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{$purchases->links()}}
                </div>
            @endif
        </div>
        
    </div>

@endsection