<?php

namespace Munib\UserProfile;

use Illuminate\Support\ServiceProvider;

class UserProfileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'userprofile');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/userprofile'),
        ], 'views');
    }

    public function register()
    {
        //
    }
}
