<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Footer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'footer';
    }
}
