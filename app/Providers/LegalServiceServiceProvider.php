<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class LegalServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('services', function ($app) {
            $tableExists = Schema::hasTable('services');

            if ($tableExists) {
                return Service::with('languages')->where('type','legal')->get();
            }

            return collect();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('services', $this->app->make('services'));
    }
}
