<?php
namespace App\Services\Geo;
use App\Services\Map\Map;
use App\Services\Sat\Sat;
use Illuminate\Support\Facades\Facade;
use App\Services\Geo\Geo;
class GeoFacade extends Facade{
protected static function getFacadeAccessor()
{
    return Geo::class;
}

}