<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class GeneralJsonException extends Exception
{
   public function report(){
      dump('akadasdasd');
   }


   public function render(Request $request){
      return  new JsonResponse([
        "errors" =>[
            "message" => $this->getMessage()
        ]
        ],$this->code);

   }
}
