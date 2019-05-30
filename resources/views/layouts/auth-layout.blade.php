<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        
        @include('partials.head')
        @yield('head')
<style>
    html,
body {
    height: 100%;
}

.container {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        
        <div class="main-container container-fluid">
            <div class="page-container">
                
            
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
