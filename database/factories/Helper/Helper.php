<?php

namespace Database\Factories\Helper;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class Helper
{
   /**
 * 
 * @param string | HasFactory $model 
 */
   public function returnid(string $model){
    $count2 = $model::query()->count();
      
    if($count2 == 0){
        $userid = $model::factory()->create()->id;
    }else{
        $userid = $model::query()->inRandomOrder()->first()->id;

    }
    return $userid;
   }
}
