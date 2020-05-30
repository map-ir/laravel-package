<?php

namespace Shiveh\Mapir;


use Illuminate\Support\ServiceProvider;

class MapirLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        // for publish the Mapirlaravel config file to the main app config folder
        if (strpos($this->app->version(), 'Lumen') !== false) {
        }else {
            $this->publishes([
                __DIR__ . '/../config/mapir.php' => config_path('mapir.php')
            ], 'mapir');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // bind the Mapirlaravel Facade
        $this->app->bind('Mapir', function () {
            return new MapirLaravel();
        });
    }
}