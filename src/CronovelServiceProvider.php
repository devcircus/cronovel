<?php

namespace DevCircus\Cronovel;

use \GuzzleHttp\Client;
use DevCircus\Cronovel\Cronovel;
use Illuminate\Support\ServiceProvider;

class CronovelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //Publishes package config file to applications config folder
        $this->publishes([__DIR__.'/config/cronovel.php' => config_path('cronovel.php')]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $app = $this->app;
         $this->mergeConfigFrom(
            __DIR__ . '/config/cronovel.php', 'cronovel'
        );
        $config = $app['config']->get('cronovel');
        $client = new Client(['base_uri' => $config['cronofy_root_url']]);
       

        $app->singleton(Cronovel::class, function() use ($client, $config){
            return new Cronovel($client, $config['cronofy_token']);
        });

        $app->alias(Cronovel::class, 'cronovel');

    }
}
