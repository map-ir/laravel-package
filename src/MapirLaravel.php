<?php

namespace Shiveh\Mapir;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class MapirLaravel
{
    public static function search($text, $select, $filter, $location)
    {
        try{
            $client= new Client();
            $body=[
                'text' =>$text,
                '$select' => $select,
                '$filter' => $filter,
                'location' => $location
            ];
            $header=[
                'x-api-key' => config('mapir.api-key','Your map.ir api key'),
                'Content-Type' => 'application/json'
            ];
            $result= $client->request(
                'POST',
                config('mapir.webservice-url','https://map.ir').'/search',
                ['headers'=>$header, 'json'=>$body]
            );
            return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }
    public static function searchAutocomplete($text, $select, $filter, $location)
    {
        try{
        $client= new Client();
        $body=[
            'text' =>$text,
            'select' => $select,
            'filter' => $filter,
            'location' => $location
        ];
        $header=[
            'x-api-key' => config('mapir.api-key','Your map.ir api key'),
            'Content-Type' => 'application/json'
        ];
        $result= $client->request(
            'POST',
            config('mapir.webservice-url','https://map.ir').'/search/autocomplete',
            ['headers'=>$header, 'json'=>$body]
        );
        return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }

    }
    public static function reverse($lat, $lon)
    {
        try{
        $client= new Client();
        $query=[
            'lat' =>$lat,
            'lon' => $lon,
        ];
        $header=[
            'x-api-key' => config('mapir.api-key','Your map.ir api key'),
            'Content-Type' => 'application/json'
        ];
        $result= $client->request(
            'GET',
            config('mapir.webservice-url','https://map.ir').'/reverse',
            ['headers'=>$header, 'query'=>$query]
        );
        return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }
    public static function fastReverse($lat, $lon)
    {
        try{
        $client= new Client();
        $query=[
            'lat' =>$lat,
            'lon' => $lon,
        ];
        $header=[
            'x-api-key' => config('mapir.api-key','Your map.ir api key'),
            'Content-Type' => 'application/json'
        ];
        $result= $client->request(
            'GET',
            config('mapir.webservice-url','https://map.ir').'/fast-reverse',
            ['headers'=>$header, 'query'=>$query]
        );
        return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }

}
