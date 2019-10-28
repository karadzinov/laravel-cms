@extends('admin/master')

@section('pageTitle')
    {{trans('products.products')}}
@endsection

@section('head')
    <style>
        label{
            display: block;
        }
    </style>
@endsection
@section('content')
    <div class="widget">
        
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
            	<i class="fa fa-money"></i> 
            	{!!$product->name!!}
            </span>
            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">
                <i class="fa fa-edit"></i> 
                {{trans('products.edit')}}
            </a>
            <a href="{{route('admin.products.index')}}" class="btn btn-deafult pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                {{trans('products.back-to')}}
            </a>
        </div>

        <div class="widget-body">
            <div>
                <label for="name"><strong>{{trans('admin.name')}}:</strong></label>
                <p id="name">{!!$product->name!!}</p>
            </div>

            <div>
                <label for="description"><strong>{{trans('admin.description')}}:</strong></label>
                <pre id="description"><code>{!!$product->description!!}</code></pre>
            </div>

            @if($product->main_image)
                <div>
                    <label for="image"><strong>{{trans('admin.image')}}:</strong></label>
                    <br>
                    <img src="{{$product->thumbnailPath}}" alt="{{$product->main_image}}" id="image">
                </div>
            @endif

            @if($product->video)
                <div>
                    <label for="video"><strong>{{trans('admin.video')}}:</strong></label>
                    <a href="{{$product->video}}" target="_blank">
                        <img src="{{$product->videoPreviewImage}}" alt="">
                    </a>
                </div>
                <br>
            @endif

            <div>
                <label for="category"><strong>{{trans('admin.category')}}:</strong></label>
                <p id="category">{{$product->category->name}}</p>
            </div>
            @if($product->author)
                <div>
                    <label for="author"><strong>{{trans('admin.author')}}:</strong></label>
                    <p id="author">{{$product->author->name}}</p>
                </div>
            @endif

            @if($product->price)
                <div>
                    <label for="price"><strong>{{trans('admin.price')}}:</strong></label>
                    <p id="price">{{$product->price . $currency}}</p>
                </div>
            @endif

            @if($product->reduction)
                <div>
                    <label for="reduction"><strong>{{trans('admin.reduction')}}:</strong></label>
                    <p id="reduction">{{$product->reduction}}% <span>({{trans('admin.reducted-price')}}: {{$product->reductedPrice . $currency}})</span></p>
                </div>
            @endif

            @if($product->quantity !== null)
                <div>
                    <label for="quantity"><strong>{{trans('admin.quantity')}}:</strong></label>
                    <p id="quantity">{{$product->quantity}}</p>
                </div>
            @endif

            @if($product->author)
                <div>
                    <label for="author"><strong>{{trans('admin.author')}}:</strong></label>
                    <p id="author">{{$product->author->name}}</p>
                </div>
            @endif

            <div>
            	<label for="active"><strong>{{trans('admin.active')}}:</strong></label>
        		@if($product->active)
					<span class="label label-success">
                        {{trans('admin.active')}}
                    </span>
        		@else
					<span class="label label-danger">
	                    {{trans('admin.not-active')}}
	                </span>
        		@endif
            </div>

            <div>
            	<label for="delivery"><strong>{{trans('admin.delivery')}}:</strong></label>
        		@if($product->delivery)
					<span class="label label-success">
                        {{trans('admin.delivery')}}
                    </span>
        		@else
					<span class="label label-danger">
	                    {{trans('admin.without-delivery')}}
	                </span>
        		@endif
            </div>
        </div>
        
    </div>
@endsection
