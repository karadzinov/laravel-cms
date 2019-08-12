<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('partials/admin/head')
        @yield('head')
        <style>
            .admin-language-switcher{
                margin: 0 10%;
                text-transform: uppercase;

            }
        </style>
    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        @include('partials/admin/nav')
        <div class="main-container container-fluid">
            <div class="page-container">
                @include('partials/admin/chat/chatbar')
                @include('partials/admin/sidebar')
            
                <div class="page-content">
                    @include('partials/admin/form-status')
                    @yield('content')
                </div>
            </div>
        </div>

        @include('partials/admin/footer')

        @include('partials/admin/scripts')

        @yield('footer_scripts')

    </body>
</html>
