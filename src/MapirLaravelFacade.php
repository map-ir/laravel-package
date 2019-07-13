<?php

namespace Shiveh\Mapir;

use Illuminate\Support\Facades\Facade;

class MapirLaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Mapir';
    }
}