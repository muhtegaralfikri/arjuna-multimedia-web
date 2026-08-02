<?php

namespace App\Providers;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // UUID for all models
        \Illuminate\Database\Eloquent\Model::preventSilentlyDiscardingAttributes($this->app->isLocal());

        // Force UUID for route model binding
        \Illuminate\Support\Facades\Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');

        $appUrl = config('app.url');

        if (! $this->app->isLocal() && is_string($appUrl) && str_starts_with($appUrl, 'https://')) {
            URL::forceRootUrl(rtrim($appUrl, '/'));
            URL::forceScheme('https');
        }

        // Globally share settings & contact to all views (cached)
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $view->with('settings', \App\Models\SiteSettings::getSettings());
            $view->with('contact', \App\Models\Contact::getContact());
        });
    }
}
