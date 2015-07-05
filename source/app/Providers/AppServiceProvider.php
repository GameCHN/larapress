<?php

namespace YCMS\Providers;

use Illuminate\Support\ServiceProvider;
use YCMS\Extensions\DouyasiBlade;
use View;
use Illuminate\Support\MessageBag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        DouyasiBlade::register();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        View::share('errors', new MessageBag([]));
       //
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
