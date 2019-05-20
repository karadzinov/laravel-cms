<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        
        @include('partials.head')
        @yield('head')

    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        @include('partials.nav')
        <div id="main-container container-fluid">
            <div class="page-container">
                @include('partials.sidebar')
            
                <div class="page-content">
                    @include('partials.form-status')
                    @yield('content')
                </div>
            </div>
        </div>

        @include('partials.footer')

        @include('partials.scripts')

        @yield('footer_scripts')

    </body>
</html>
