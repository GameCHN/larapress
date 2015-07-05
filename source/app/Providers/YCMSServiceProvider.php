<?php

namespace YCMS\Providers;

use Illuminate\Support\ServiceProvider;
use YCMS\Models\YCMS;

class YCMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('Y', function () {
            return new YCMS;
        });
    }
}
