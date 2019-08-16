<?php

namespace App\Providers;

use App\Models\Theme;
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

       
        $theme = Theme::where('active', '=', 1)->first();
        $path = 'user/'.$theme->root_folder . '/';
        
        View::composer(
            [$path . 'partials/head',
            $path . 'partials/header',
            $path . 'partials/footer',
            $path . 'partials/nav',
            ], 'App\Http\View\Composers\SettingsComposer'
        );

        View::composer(
            $path . 'partials/nav', 'App\Http\View\Composers\NavComposer'
        );

        View::composer(
            $path . 'master', 'App\Http\View\Composers\MasterComposer'
        );

        View::composer(
            'admin/partials/chat/chatbar', 'App\Http\View\Composers\ChatbarComposer'
        );

        View::composer(
            $path . 'partials/footer', 'App\Http\View\Composers\FooterComposer'
        );

        View::composer(
            'admin/partials/nav', 'App\Http\View\Composers\AdminNavComposer'
        );
    }
}
