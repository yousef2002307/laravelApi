<?php
namespace App\Helper\Routes;

use Illuminate\Support\Facades\Route;


class RouteHelper
{
   public static function getRoutes(string $filename){
    $d1 = new \RecursiveDirectoryIterator($filename);
    $d2 = new \RecursiveIteratorIterator($d1);
    while($d2->valid()) {
       if(!$d2->isDot() && $d2->isFile() && $d2->isReadable() && $d2->current()->getExtension() == 'php') {
          require $d2->key();
          
       }
       $d2->next();
    }
   }
}