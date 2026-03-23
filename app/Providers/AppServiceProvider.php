<?php

namespace App\Providers;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // UUID for all models
        \Illuminate\Database\Eloquent\Model::preventSilentlyDiscardingAttributes($this->app->isLocal());

        // Force UUID for route model binding
        \Illuminate\Support\Facades\Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
    }
}
