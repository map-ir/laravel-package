<?php

namespace Shiveh\Mapir;

use Illuminate\Support\Facades\Facade;

/**
 * Class MapirLaravelFacade
 *
 * @package Shiveh\Mapir
 * @method static mixed search($text, $select, $filter, $location)
 * @method static mixed searchAutocomplete($text, $select, $filter, $location)
 * @method static mixed reverse($lat, $lon)
 * @method static mixed fastReverse($lat, $lon)
 * @method static mixed search_v2($text, $select = "" , $filter = "" , $lat = 0 , $lon = 0)
 * @method static mixed searchAutocomplete_v2($text, $select = "" , $filter = "" , $lat = 0 , $lon = 0)
 * @method static mixed distanceMatrix($origins, $destinations)
 */
class MapirLaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Mapir';
    }
}