<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('languages', function ($app) {
            $tableExists = Schema::hasTable('languages');

            if ($tableExists) {
                return Language::get();
            }

            return collect();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('languages', $this->app->make('languages'));
    }
}
