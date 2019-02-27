<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\SlackHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $monolog = Log::getLogger();
        $slackHandler = new SlackHandler('xoxp-478547737904-480685261574-515918399861-c2137c8bebb7d4fe1b9f560433fa1b7a', '#cms', 'Monolog', true, null, \Monolog\Logger::WARNING);
        $monolog->pushHandler($slackHandler);

        //Paginator::useBootstrapThree();
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
