<?php
namespace App\Helper\Routes;

use Illuminate\Support\Facades\Route;


class RouteHelper
{
   public static function getRoutes(string $filename): void
   {
       $directoryIterator = new \RecursiveDirectoryIterator($filename);
       $iteratorIterator = new \RecursiveIteratorIterator($directoryIterator);

       foreach ($iteratorIterator as $file) {
           if ($file->isFile() && $file->isReadable() && $file->getExtension() === 'php') {
               require $file->getPathname();
           }
       }
   }
}
