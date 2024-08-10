<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {

        $locale = Cookie::get('locale', config('app.locale'));
        App::setLocale($locale);
        return $next($request);
    }
}
