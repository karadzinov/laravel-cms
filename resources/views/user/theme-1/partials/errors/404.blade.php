<div class="main-container parallax jumbotron border-clear light-translucent-bg text-center margin-clear" style="background-image:url('{{asset('assets/theme-1/images/fullscreen-bg.jpg')}}');">
    <div class="container">
        <div class="row">
            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-6 col-md-offset-3 pv-40">
                <h1 class="page-title"><span class="text-default">404</span></h1>
                <h2>{{trans('general.errors.404-not-found')}}</h2>
                <p>{{trans('general.errors.404-not-found-explication')}}.</p>
                @include($path . 'partials/search-form')
                <a href="/" class="btn btn-default btn-animated btn-lg">{{trans('general.back-to-home')}} <i class="fa fa-home"></i></a>
            </div>
            <!-- main end -->
        </div>
    </div>
</div>
<!-- main-container end -->