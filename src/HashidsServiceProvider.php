<?php  namespace Swiggles\Hashids;

use Illuminate\Support\ServiceProvider;

/**
 * This is the Hashids service provider class.
 */
class HashidsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/hashids.php');

        $this->publishes([$source => config_path('hashids.php')]);
        $this->mergeConfigFrom($source, 'hashids');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hashids', function ($app) {
            return new Hashids(
                $app['config']['hashids.salt'],
                $app['config']['hashids.length'],
                $app['config']['hashids.alphabet']
            );
        });

        $this->app->alias('hashids', HashGenerator::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'hashids',
            HashGenerator::class
        ];
    }
}
