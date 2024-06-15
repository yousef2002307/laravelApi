<?php
namespace App\Services;
use App\Services\Geo\Geo;
use App\Services\Geo\GeoFacade;
class PlayGround
{
    private $geo;
    public function __construct(Geo $geo)
    {
      $in = GeoFacade::search("ssssssssssss");
      return $in;
   
    }
    public function search2($name){
     
    }
}