<?php

namespace Phpuzem\Linkify;

use Phpuzem\Linkify\LinkifyController;
use Illuminate\Support\ServiceProvider;

class LinkifyServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    // protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/linkify.php' => config_path('linkify.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['linkify'] = $this->app->share(function($app)
        {
            return new LinkifyController;
        });

        $this->app->alias('linkify', 'Phpuzem\Linkify\LinkifyController');
    }

}
