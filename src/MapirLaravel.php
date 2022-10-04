<?php

namespace Shiveh\Mapir;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class MapirLaravel
{
    /**
     * @param $text
     * @param $select
     * @param $filter
     * @param $location
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
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
                'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
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

    /**
     * @param $text
     * @param $select
     * @param $filter
     * @param $location
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
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
            'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
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

    /**
     * @param $lat
     * @param $lon
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function reverse($lat, $lon)
    {
        try{
        $client= new Client();
        $query=[
            'lat' =>$lat,
            'lon' => $lon,
        ];
        $header=[
            'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
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

    /**
     * @param $lat
     * @param $lon
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fastReverse($lat, $lon)
    {
        try{
        $client= new Client();
        $query=[
            'lat' =>$lat,
            'lon' => $lon,
        ];
        $header=[
            'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
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

    /**
     * @param          $text
     * @param  string  $select
     * @param  string  $filter
     * @param  int     $lat
     * @param  int     $lon
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function search_v2($text, $select = "" , $filter = "" , $lat = 0 , $lon = 0)
    {
        try{
            $client= new Client();
            $body=[
                'text' =>$text,
                '$select' => $select,
                '$filter' => $filter,
                'lat'=> $lat,
                'lon'=>$lon
            ];

            if ($select == ""){
                unset($body['$select']);
            }
            if ($filter == ""){
                unset($body['$filter']);
            }
            if ($lat == 0 or $lon == 0){
                unset($body['lon']);
                unset($body['lat']);
            }

            $header=[
                'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
                'Content-Type' => 'application/json'
            ];
            $result= $client->request(
                'POST',
                config('mapir.webservice-url','https://map.ir').'/search/v2',
                ['headers'=>$header, 'json'=>$body]
            );
            return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }

    /**
     * @param          $text
     * @param  string  $select
     * @param  string  $filter
     * @param  int     $lat
     * @param  int     $lon
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function searchAutocomplete_v2($text, $select = "" , $filter = "" , $lat = 0 , $lon = 0)
    {
        try{
            $client= new Client();
            $body=[
                'text' =>$text,
                '$select' => $select,
                '$filter' => $filter,
                'lat'=> $lat,
                'lon'=>$lon
            ];

            if ($select == ""){
                unset($body['$select']);
            }
            if ($filter == ""){
                unset($body['$filter']);
            }
            if ($lat == 0 or $lon == 0){
                unset($body['lon']);
                unset($body['lat']);
            }

            $header=[
                'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
                'Content-Type' => 'application/json'
            ];
            $result= $client->request(
                'POST',
                config('mapir.webservice-url','https://map.ir').'/search/v2/autocomplete',
                ['headers'=>$header, 'json'=>$body]
            );
            return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }

    /**
     * @param $origins
     * @param $destinations
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function distanceMatrix($origins, $destinations)
    {
        try{
            $client= new Client();
            $query=[
                'origins' =>$origins,
                'destinations' => $destinations,
            ];
            $header=[
                'x-api-key' => config('mapir.x-api-key','Your map.ir api key'),
                'Content-Type' => 'application/json'
            ];
            $result= $client->request(
                'GET',
                config('mapir.webservice-url','https://map.ir').'/distancematrix',
                ['headers'=>$header, 'query'=>$query]
            );
            return json_decode($result->getBody(),true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }

}
