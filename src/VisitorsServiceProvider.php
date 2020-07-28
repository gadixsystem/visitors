<?php

namespace gadixsystem\visitors;

use Illuminate\Support\ServiceProvider;

class VisitorsServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     */
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Publish views
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/gadixsystem/visitors'),
        ], 'views');
        // Views
        $this->loadViewsFrom($this->app->resourcePath('views/gadixsystem/visitors'), 'visitors');

        // Migrations
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        // Publish migrations
        $this->publishes([
            __DIR__ . '/Database/migrations/' => database_path('migrations')
        ], 'migrations');

        // Middleware
        $this->app['router']->aliasMiddleware('visitors', Http\Middleware\Visitors::class);

        // Config
        // Allow  to publish the config
        $this->publishes([
            __DIR__ . '/config/visitors.php' => config_path('visitors.php'),
        ], 'config');
    }

    /**
     * Register
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/visitors.php',
            'visitors'
        );
    }
}
