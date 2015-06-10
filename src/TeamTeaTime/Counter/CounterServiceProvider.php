<?php namespace TeamTeaTime\Counter;

use Illuminate\Support\ServiceProvider;

class CounterServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/counter.php', 'counter');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish migrations and config
        $this->publishes([
            __DIR__.'/../../migrations/' => base_path('/database/migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../config/counter.php' => config_path('counter.php')
        ], 'config');
    }

}
