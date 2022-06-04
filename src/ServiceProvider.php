<?php
namespace Drsoft\LaravelJasper;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
{
    $this->registerAliases();
    $this->mergeConfigFrom(
        __DIR__.'/../config/laraveljasper.php', 'laraveljasper'
    );
}
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laraveljasper.php' => config_path('laraveljasper.php'),
        ],'laravel-jasper-config');
    }

    protected function registerAliases()
    {
        
        $this->app->bind('drsoft.laraveljasper', function($app) {
            return new LaravelJasper();
        });
      
    }
}