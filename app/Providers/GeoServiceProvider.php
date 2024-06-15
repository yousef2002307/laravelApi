<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Geo\Geo;
use    App\Services\Map\Map;
use    App\Services\Sat\Sat;
class GeoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
