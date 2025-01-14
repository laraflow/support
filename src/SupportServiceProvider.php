<?php

namespace Laraflow\Support;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Laraflow\Support\Providers\EventServiceProvider;
use Laraflow\Support\Providers\RouteServiceProvider;

class SupportServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/support.php', 'laraflow.support'
        );

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(EventServiceProvider::class);

        $this->registerAliases();
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'support');

        $this->loadViewsFrom(__DIR__ . '/../views', 'support');

        $this->loadPublishOptions();

        $this->registerCommands();

    }

    private function loadPublishOptions()
    {
        // Package Configuration
        $this->publishes([
            __DIR__ . '/../config/support.php' => config_path('laraflow/support.php'),
        ], 'support-config');

        // Package Translation
        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/support'),
        ], 'support-lang');

        // Package Blade Views
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/laraflow/support'),
        ], 'support-views');
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
            ]);
        }
    }

    private function registerAliases()
    {
        foreach (Config::get('laraflow.support.aliases', []) as $alias => $concrete) {
            $this->app->alias($alias, $concrete);
        }
    }
}
