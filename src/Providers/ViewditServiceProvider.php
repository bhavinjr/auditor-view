<?php

namespace Bhavinjr\Viewdit\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ViewditServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->defineAssetPublishing();
    }

    /**
     * Register the Viewdit routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix'        =>  'viewdit',
            'namespace'     =>  'Bhavinjr\Viewdit\Http\Controllers',
            'middleware'    =>  config('viewdit.middleware', 'web')
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }

    /**
     * Register the Viewdit resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'viewdit');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function defineAssetPublishing()
    {
        $this->publishes([
            VIEWDIT_PATH.'/public' => public_path('vendor/viewdit'),
        ], 'viewdit-assets');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('VIEWDIT_PATH')) {
            define('VIEWDIT_PATH', realpath(__DIR__.'/../../'));
        }

        $this->offerPublishing();
    }

    /**
     * Setup the resource publishing groups for Horizon.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        $this->publishes([
            __DIR__.'/../../config/viewdit.php' => config_path('viewdit.php'),
        ], 'viewdit-config');
    }
}
