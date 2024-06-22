<?php
namespace Database\Seeders\Traits;
use Illuminate\Support\Facades\DB;
Trait ForeignKeys
{
  public function enable():void{
    DB::statement("SET FOREIGN_KEY_CHECKS = 1"); 
  }

  public function disable():void{
    DB::statement("SET FOREIGN_KEY_CHECKS = 0");
  }
}