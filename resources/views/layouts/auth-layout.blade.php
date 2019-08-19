<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        
        @include('admin/partials/head')
        @yield('head')
<style>
    .social-buttons{
        height: 100% !important;
    }
    .register-container .registerbox{
        height: 100% !important;
        padding-bottom: 20px;
    }
    .useSocial{
        margin-top: 50px;
    }
</style>
    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        @include('admin/partials/form-status')
        @yield('content')
        @include('admin/partials/footer')
        @yield('footer_scripts')
    </body>
</html>
