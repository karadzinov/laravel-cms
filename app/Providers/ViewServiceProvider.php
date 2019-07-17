<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'layouts.app', 'App\Http\View\Composers\ThemeComposer'
        );

        View::composer(
            ['partials/user/head',
            'partials/user/header',
            'partials/user/footer',
            ], 'App\Http\View\Composers\SettingsComposer'
        );

        View::composer(
            'partials/user/nav', 'App\Http\View\Composers\NavComposer'
        );

        View::composer(
            'layouts/master', 'App\Http\View\Composers\MasterComposer'
        );

        View::composer(
            'partials/chat/chatbar', 'App\Http\View\Composers\ChatbarComposer'
        );

        View::composer(
            'partials/user/footer', 'App\Http\View\Composers\FooterComposer'
        );
    }
}
