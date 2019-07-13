<?php

namespace Shiveh\Mapir;


class Filter
{
    public static function city($city)
    {
        return 'city eq '.$city;
    }

    public static function province($province)
    {
        return 'province eq '.$province;
    }
    public static function county($county)
    {
        return 'county eq '.$county;
    }
    public static function district($district)
    {
        return 'district eq '.$district;
    }
    public static function neighborhood($neighborhood)
    {
        return 'neighborhood eq '.$neighborhood;
    }
    public static function distance($distance)
    {
        return 'distance eq '.$distance;
    }
}