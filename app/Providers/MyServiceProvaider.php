<?php

namespace App\Providers;

use App\Services\My\My;
use Illuminate\Support\ServiceProvider;

class MyServiceProvaider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('my', function() {
            return new My;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
