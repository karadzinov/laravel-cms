@php
    $theme = App\Models\Theme::where('active', '=', 1)->first();
    $path = 'user/'.$theme->root_folder . '/';
@endphp

@extends($path . 'master')

@section('content')
    <div class="main-container parallax jumbotron border-clear light-translucent-bg text-center margin-clear" style="background-image:url('{{asset('assets/images/fullscreen-bg.jpg')}}');">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-6 col-md-offset-3 pv-40">
                    <h1 class="page-title"><span class="text-default">404</span></h1>
                    <h2>Ooops! Page Not Found</h2>
                    <p>The requested URL was not found on this server. Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</p>
                    @include($path . 'partials/search-form')
                    <a href="/" class="btn btn-default btn-animated btn-lg">Return Home <i class="fa fa-home"></i></a>
                </div>
                <!-- main end -->
            </div>
        </div>
    </div>
    <!-- main-container end -->
@endsection