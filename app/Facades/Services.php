<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Services extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'services';
    }
}
