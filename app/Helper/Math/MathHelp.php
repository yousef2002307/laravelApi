<?php
namespace App\Helper\Math;

class MathHelp{
    public static function add(...$args){
        if(sizeof($args) < 1){
            throw new \InvalidArgumentException('at least 1 arg is required');
        }
     $sum = 0;
     for($i = 0; $i < count($args); $i++){
        if(!is_int($args[$i]) && !is_float($args[$i])){
       throw new \InvalidArgumentException('args can be only nums');
        }else{
            $sum += $args[$i];
        }
     }
     return $sum;

    }

    public static function minus(){

    }
}