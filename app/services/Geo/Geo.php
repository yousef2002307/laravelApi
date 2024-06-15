<?php
namespace App\Services\Geo;
use App\Services\Map\Map;
use App\Services\Sat\Sat;
class Geo{
private $map;
private $sat;
    public function __construct(Map $map,Sat $sat){
        
        $this->map = $map;
        $this->sat = $sat;

    }
    public function search($name){
        $add = $this->map->address();
        return $this->sat->pinpoint();
    }
public function add($name){
    
    return $name . "mahda";
}
}