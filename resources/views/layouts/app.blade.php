<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        
        @include('partials.head')
        @yield('head')

    </head>
    <body>
        <div id="app">

            @include('partials.nav')

            <main class="py-4">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @include('partials.form-status')
                        </div>
                    </div>
                </div>

                @yield('content')

            </main>

        </div>

        @include('partials.footer')

        @include('partials.scripts')

        @yield('footer_scripts')

    </body>
</html>
