<p align="center"><img src="https://support.map.ir/wp-content/uploads/2019/03/site-logo.png"></p>

<p align="center">Official Laravel Package for map.ir</p>

[![Latest Stable Version](https://poser.pugx.org/shiveh/mapir/v/stable)](https://packagist.org/packages/shiveh/mapir)
[![Total Downloads](https://poser.pugx.org/shiveh/mapir/downloads)](https://packagist.org/packages/shiveh/mapir)
[![License](https://poser.pugx.org/shiveh/mapir/license)](https://packagist.org/packages/shiveh/mapir)
[![Monthly Downloads](https://poser.pugx.org/shiveh/mapir/d/monthly)](https://packagist.org/packages/shiveh/mapir)
[![Daily Downloads](https://poser.pugx.org/shiveh/mapir/d/daily)](https://packagist.org/packages/shiveh/mapir)
<a align="center" href="https://corp.map.ir">Service Documentation </a>



Hi, if you have an account in map.ir, you can use this package for laravel

How to install:
----
   ```
    composer require shiveh/mapir 
    php artisan vendor:publish --tag=mapir
  ```

> **Setup:**
>

>Laravel Installation
>
 add this line to your app.php providers:
 ~~~
  Shiveh\Mapir\MapirLaravelServiceProvider::class,
 ~~~
 and add this line to your app.php aliases:
 ~~~ 
 'Mapir' => Shiveh\Mapir\MapirLaravelFacade::class,
~~~
After publish the package files you must open mapir.php in config folder and set the api-key.

> **Like this:**

	'webservice-url' => env('MAPIR_WEBSERVICE_URL','https://map.ir'),
	'api-key' => env('MAPIR_API_KEY','Your map.ir api key'),
> 
>Lumen Installation
 >
 add package service provider in bootstrap/app.php.
 ~~~
 $app->register(Shiveh\Mapir\MapirLaravelServiceProvider::class);
 class_alias(Shiveh\Mapir\MapirLaravelFacade::class, 'Mapir');
 ~~~
 copy package config directory `vendor/shiveh/mapir/config` to root folder alongside with app directory.
 
 update bootstrap/app.php by adding this line in `Register Config Files` section:
  ~~~
  $app->configure('mapir');
  ~~~
 
 Making Lumen work with facades by uncommenting this line in bootstrap/app.php.
 ~~~
 $app->withFacades();
 ~~~
>### Note:
>
you can set the keys  in your .env file

> **like this:**
~~~
 MAPIR_WEBSERVICE_URL=https://map.ir

 MAPIR_API_KEY=your api-key
~~~



Methods:
-------------

>Mapir::search():
 ~~~
   \Mapir::search(
           'ساوجینیا',
           Select::POI,
           Filter::distance('20km'),
           [
               "type"=> "Point",
               "coordinates"=> [
                   51.3361930847168,
                   35.7006311416626
               ]
           ]
       );
 ~~~
 The search method has four arguments.
 
  >Text(Required):
  >
  This argument is used as a text, which you want to find it's location on map. for example (ساوجینیا)
>Select(Optional):
>
 Inorder to apply your search request on specific group of entities.
~~~
 Select :: POI
 ~~~
 >To select each of these land effects, first write "Select::" and then the name of the land effects according to the following table:
 >
 | ID | Entities        | Description                                                              | Example                            |
 |----|-----------------|--------------------------------------------------------------------------|------------------------------------|
 | 1  | POI             | The search is on places recorded on the map.                  | Select::POI                        |
 | 2  | PROVINCE        | The search is on provinces.                                               | Select::PROVINCE                   |
 | 3  | CITY            | The search is on cities.                                                   | Select::CITY                       |
 | 4  | COUNTY          | The search is on counties.                                                 | Select::COUNTY                     |
 | 5  | DISTRICT        | The search is on districts.                                               | Select::DISTRICT                   |
 | 6  | NEIGHBORHOOD    | The search is on neighborhoods.                                           | Select::NEIGHBORHOOD               |
 | 7  | LANDUSE         | The search is on landuse.                                                | Select::LANDUSE                    |
 | 8  | WOODWATER       | The search is on Natural resources (For example mountains, forests etc). | Select::WOODWATER                  |
 | 9  | ROADS           | The search is on roads .                                                 | Select::ROADS                      |
 | 10 | multiLandEffect | To select a few items |                                  Select::multiLandEffect([Select::POI,Select::ROADS]) |

 >Filter(Optional):
 >
  To filter search results, for example, get results only in Tehran.
 ~~~
 Filter :: city ('تهران')
 ~~~
 >More filter features:
 >
 | ID | Methods      | Description                                | Example                     |
 |----|--------------|--------------------------------------------|-----------------------------|
 | 1  | city         | Filter by city                             | Filter::city('تهران')       |
 | 2  | county       | Filter by county                           | Filter::county('رباط کریم') |
 | 3  | district     | Filter by district                         | Filter::district('درکه')    |
 | 4  | neighborhood | Filter by neighborhood                     | Filter::neighborhood('عباس آباد')    |
 | 5  | distance     | Filter by distance for example 20m or 20km | Filter::distance('20m')     |
 | 6  | province     | Filter by province                         | Filter::province('کردستان') |
 > Geographic coordinates(Required):
 >
 Use this format for coordinates, inorder to get better result. 
 look for other possible formats in this site [geojson.io](http://geojson.io/).
~~~
[
  "type"=> "Point",
  "coordinates"=> [
             51.3361930847168,
             35.7006311416626
    ]
]
~~~ 
 
> Mapir::searchAutocomplete()
~~~
\Mapir::searchAutocomplete(
        'ساوجی',  
        Select::POI,
        Filter::distance('20km'),
        [
            "type"=> "Point",
            "coordinates"=> [
                51.3361930847168,
                35.7006311416626
            ]
        ]
    );
~~~
The search differs with the search (live search) in the concept of the structure of the search words. When using a normal search, the search algorithm looks for addresses that are exactly the same as the text of the input, while the live search matches some of the information entered with the existing data and suggests the closest and most likely results.
> Mapir::reverse()
~~~
   \Mapir::reverse(35.732634, 51.422571);
~~~
The reverse is the conversion of geographic coordinates to text addresses
> Mapir::fastReverse()

~~~
   \Mapir::fastReverse(35.732634, 51.422571);
~~~
The difference between these two different types of addressing is in detail and the response speed. In full mode, along with the details of the address, if the coordinates of the location are registered on the map, the registered place name is also returned in the response, while in the fast state of this feature does not exist.
The main advantage of fast addressing is its speed, so that its response time is about 20ms, while in a full-time matching mode, this is about 70ms.
## License
[![FOSSA Status]()]()
