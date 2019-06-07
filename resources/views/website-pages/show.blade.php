@extends('layouts.app')

@section('head')
    <link rel='stylesheet' href='{{asset('js/vendor/unitegallery/dist/css/unite-gallery.css')}}' type='text/css' /> 
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-newspaper-o"></i> 
                Pages
            </span>
            <a href="{{route('pages.index')}}" class="btn btn-default pull-right">
                <i class="fa fa-fw fa-reply-all"></i> 
                Back To Pages
            </a>
            <a href="{{route('pages.edit', $page->id)}}" class="btn btn-warning pull-right">
                Edit Page
            </a>
        </div>
        <div class="widget-body">
            <div>
                <label for="title"><strong>Title:</strong></label>
                <p>{!!$page->title!!}</p>
            </div>
            <div>
                <label for="subtitle">Subtitle:</label>
                <pre><code>{!!$page->subtitle!!}</code></pre>
            </div>
            <div>
                <label for="main_text">Main Text:</label>
                <pre id="main_text"><code>{!!$page->main_text!!}</code></pre>
            </div>

            @if($page->images->isNotEmpty())
                <label for="gallery">Images:</label>

                <div id="gallery">
                    @foreach($page->images as $image)
                        <img src="{{$page->originalPath . $image->name}}" alt="{{$image->name}}">
                    @endforeach
                </div>
            @endif
            
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script src='{{asset('js/vendor/unitegallery/dist/js/unitegallery.min.js')}}'></script> 
    <script src='{{asset('js/vendor/unitegallery/dist/themes/compact/ug-theme-compact.js')}}'></script> 
    <script type="text/javascript"> 
        jQuery("#gallery").unitegallery({
            gallery_theme: "compact"
        });
    </script>
@endsection