<?php

namespace App\Providers;

use App\Services\Dbv\Dbv;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class DbvServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('dbv', function () {
            return new Dbv();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('dbv')->connect = DB::getPdo();
    }
}
