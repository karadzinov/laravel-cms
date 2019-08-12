@extends('layouts.app')

@section('head')
    <link rel='stylesheet' href='{{asset('assets/js/unitegallery/dist/css/unite-gallery.css')}}' type='text/css' /> 
@endsection
@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-id-card-o"></i>  
                About Page
            </span>
            <a href="{{route('admin.about.edit')}}" class="btn btn-warning pull-right">
                Edit About Page
            </a>
        </div>
        <div class="widget-body">
            @if($about)
                <div>
                    <label for="welcome_note"><strong>Welcome Note:</strong></label>
                    <p>{!!$about->welcome_note!!}</p>
                </div>
                <div>
                    <label for="about"><strong>About:</strong></label>
                    <div>{!!$about->about!!}</div>
                </div>
                <div>
                    <label for="admin-offer"><strong>Our Offer:</strong></label>
                    <div id="admin-offer">{!!$about->offer!!}</div>
                </div>
                <div>
                    <label for="why_us"><strong>Why Us:</strong></label>
                    <div id="why_us">{!!$about->why_us!!}</div>
                </div>

                <div>
                    <label for="image"><strong>Main Image:</strong></label>
                    <div>
                        <img src="{{$about->thumbnailPath . $about->image}}">
                    </div>
                </div>
                <br>

                <div>
                    <label for="video"><strong>Video:</strong></label>
                    <div id="video">{!!$about->videoPreview!!}</div>
                </div>
                <br>


                @if($about->images->isNotEmpty())
                    <label for="gallery">Images:</label>

                    <div id="gallery">
                        @foreach($about->images as $image)
                            <img src="{{$about->originalPath . $image->name}}" alt="{{$image->name}}">
                        @endforeach
                    </div>
                @endif
            @else
                <a href="{{ route('admin.about.create') }}" class="btn btn-success btn-lg">
                Create About Page for This Language
            </a>
            @endif
            
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script src='{{asset('assets/js/unitegallery/dist/js/unitegallery.min.js')}}'></script> 
    <script src='{{asset('assets/js/unitegallery/dist/themes/compact/ug-theme-compact.js')}}'></script> 
    <script type="text/javascript"> 
        jQuery("#gallery").unitegallery({
            gallery_theme: "compact"
        });
    </script>
@endsection