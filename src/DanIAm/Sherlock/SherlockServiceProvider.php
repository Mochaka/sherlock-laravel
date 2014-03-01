<?php namespace DanIAm\Sherlock;

use Illuminate\Support\ServiceProvider;
use Sherlock\Sherlock;
use Config;

class SherlockServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('daniam/sherlock');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('sherlock', function($app)
        {
            $sherlock = new Sherlock();

            foreach (Config::get('sherlock::nodes') as $node) {
                $sherlock->addNode($node['host'], $node['port']);
            }

            return $sherlock;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('sherlock');
    }

}
