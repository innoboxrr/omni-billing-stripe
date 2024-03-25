<?php

namespace Innoboxrr\OmniBillingStripe\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
        // $this->mergeConfigFrom(__DIR__ . '/../../config/innoboxrromnibillingstripe.php', 'innoboxrromnibillingstripe');

    }

    public function boot()
    {
        
        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // $this->loadViewsFrom(__DIR__.'/../../resources/views', 'innoboxrromnibillingstripe');

        if ($this->app->runningInConsole()) {
            
            // $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/innoboxrromnibillingstripe'),], 'views');

            // $this->publishes([__DIR__.'/../../config/innoboxrromnibillingstripe.php' => config_path('innoboxrromnibillingstripe.php')], 'config');

        }

    }
    
}