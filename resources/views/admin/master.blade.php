<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('admin/partials/head')
        @yield('head')
        <style>
            @media only screen and (max-width: 600px){
                .hide-on-mobile{
                    display: none;
                }
                .table-responsive>.table>tbody>tr>td{
                    padding-right: 0px;
                    word-break: break-all !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="loading-container loading-inactive">
            <div class="loader"></div>
        </div>
        @include('admin/partials/nav')
        <div class="main-container container-fluid">
            <div class="page-container">
                @include('admin/partials/chat/chatbar')
                @include('admin/partials/sidebar')
            
                <div class="page-content">
                    @include('admin/partials/form-status')
                    @yield('content')
                </div>
            </div>
        </div>

        @include('admin/partials/footer')

        @include('admin/partials/scripts')

        @yield('footer_scripts')

    </body>
</html>
