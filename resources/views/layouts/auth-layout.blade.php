<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('google/google-analytics')
        @include('admin/partials/head')
        @yield('head')
        <style>
            .social-buttons{
                height: 100% !important;
            }
            .login-container .loginbox .loginbox-social .social-buttons{
                padding: 20px 0;
            }
            .register-container .registerbox{
                height: 100% !important;
                padding-bottom: 20px;
            }
            .useSocial{
                margin-top: 50px;
                height: 100% !important;
            }
            .bottom{
                width: 100%;
                padding: 5px;
                margin-top: 15px;
                -webkit-box-shadow: 0 0 14px rgba(0,0,0,.1);
                -moz-box-shadow: 0 0 14px rgba(0,0,0,.1);
                box-shadow: 0 0 14px rgba(0,0,0,.1);
                background-color: #fff;
                text-align: left;
            }
            .btn-social-icon .fa{
                width: 55px
            }
            .btn-social-icon{
                font-size: 40px;
                padding: 10px;
                vertical-align: middle;

            }
            .btn-twitter{
                color: #53A5E4;
            }
            .btn-twitter:hover, .btn-twitter:focus{
                background: #53A5E4;
                color:white;
                border-radius: 100%;
            }

            .btn-facebook{
                color: #4267B2;
            }
            .btn-facebook:hover, .btn-facebook:focus{
                background: #4267B2;
                color:white;
                border-radius: 100%;
            }

            .btn-google{
                color: #D9001E;
            }
            .btn-google:hover, .btn-google:focus{
                background: #D9001E;
                color:white;
                border-radius: 100%;
            }


            .btn-github{
                color: #24292E;
            }
            .btn-github:hover, .btn-github:focus{
                background: #24292E;
                color:white;
                border-radius: 100%;
            }
            .btn-gitlab{
                color: #F56A25;
            }
            .btn-gitlab:hover, .btn-gitlab:focus{
                background: #F56A25;
                color:white;
                border-radius: 100%;
            }

            .btn-bitbucket{
                color: #2580F8;
            }
            .btn-bitbucket:hover, .btn-bitbucket:focus{
                background: #2580F8;
                color:white;
                border-radius: 100%;
            }
            
            .btn-youtube{
                color: #FF0000;
            }
            .btn-youtube:hover, .btn-youtube:focus{
                background: #FF0000;
                color:white;
                border-radius: 100%;
            }

            .btn-linkedin{
                color: #0077B5;
            }
            .btn-linkedin:hover, .btn-linkedin:focus{
                background: #0077B5;
                color:white;
                border-radius: 100%;
            }

            .btn-twitch{
                color: #6441A4;
            }
            .btn-twitch:hover, .btn-twitch:focus{
                background: #6441A4;
                color:white;
                border-radius: 100%;
            }
            .btn-instagram{
                color: #CD3E7C;
            }
            .btn-instagram:hover, .btn-instagram:focus{
                border-radius: 100%;
                color: #fff;
                background: #d6249f;
                background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
                box-shadow: 0px 3px 10px rgba(0,0,0,.25);
            }
            .register-container{
                max-width: 390px
            }
            .register-container .registerbox{
                width: 390px !important;
            }
            .register-instead{
                padding: 10px;
            }
            .bottom-separator {
                height: 0.4px;
                background-color: #ccc;
                background-image: linear-gradient(left , white 2%, #ccc 50%, white 98%);
                background-image: -o-linear-gradient(left , white 2%, #ccc 50%, white 98%);
                background-image: -moz-linear-gradient(left , white 2%, #ccc 50%, white 98%);
                background-image: -webkit-linear-gradient(left , white 2%, #ccc 50%, white 98%);
                background-image: -ms-linear-gradient(left , white 2%, #ccc 50%, white 98%);
                background-image: -webkit-gradient( linear, left bottom, right bottom, color-stop(0.02, white), color-stop(0.5, gray), color-stop(0.98, white) );
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
