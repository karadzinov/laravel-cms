<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('partials.head')
        @yield('head')
        <style>
            #searchConversationsResults{
                z-index: 124;
                padding: 10px;
                background: white;
                -webkit-box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
                -moz-box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
                top:40px;
                cursor: pointer;
            }
            .relativeDiv{
                position: relative;
            }
        </style>
    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        @include('partials.nav')
        <div class="main-container container-fluid">
            <div class="page-container">
                @include('partials/chat/chatbar')
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
