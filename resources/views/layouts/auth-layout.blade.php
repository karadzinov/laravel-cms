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
            .bottom{
                width: 100%;
                /*height: 50px !important;*/
                padding: 5px;
                margin-top: 15px;
                -webkit-box-shadow: 0 0 14px rgba(0,0,0,.1);
                -moz-box-shadow: 0 0 14px rgba(0,0,0,.1);
                box-shadow: 0 0 14px rgba(0,0,0,.1);
                background-color: #fff;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        @include('admin/partials/form-status')
        @yield('content')
        @yield('footer_scripts')
    </body>
</html>
