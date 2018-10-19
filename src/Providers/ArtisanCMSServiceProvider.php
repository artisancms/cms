<?php

namespace ArtisanCMS\CMS\Providers;

use ArtisanCMS\CMS\Models\Starter;
use Illuminate\Support\ServiceProvider;

class ArtisanCMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', config('artisancms.front.theme'));
        $this->loadViewsFrom(__DIR__.'/../resources/views/admin', 'admin');
        $this->publishes([
            __DIR__.'/../config/artisancms.php' => config_path('artisancms.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(Starter::class, function () {
            return new Starter;
        });

        $this->app->alias(Starter::class, 'starter');

        $this->loadMigrationsFrom(realpath(__DIR__.'/../migrations/'));

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->mergeConfigFrom(
            __DIR__.'/../config/artisancms.php',
            'artisancms'
        );
    }
}
