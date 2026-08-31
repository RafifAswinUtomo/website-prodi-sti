<?php

namespace App\Providers;

use App\Support\SettingsCache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['components.layouts.public', 'components.public-nav', 'components.public-footer', 'layouts.guest'], function ($view) {
            $view->with('siteSettings', SettingsCache::all());
        });
    }
}
