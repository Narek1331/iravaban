<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class FooterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('footer', function ($app) {
            $tableExists = Schema::hasTable('pages');

            if ($tableExists) {
                return Page::with('languages')->where('type','footer')->first();
            }

            return collect();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('footer', $this->app->make('footer'));
    }
}
