<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 7/8/2019
 * Time: 10:13 PM
 */

namespace Shiveh\Mapir;


class Select
{
    const POI = 'poi';
    const PROVINCE = 'province';
    const CITY = 'city';
    const COUNTY = 'county';
    const DISTRICT = 'district';
    const NEIGHBORHOOD = 'neighborhood';
    const LANDUSE = 'landuse';
    const WOODWATER = 'woodwater';
    const ROADS = 'roads';

    public static function multiLandEffect($select=[self::POI])
    {
       return implode(',',$select);
    }
}