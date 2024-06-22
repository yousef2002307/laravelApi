<?php
namespace Database\Seeders\Traits;
use Illuminate\Support\Facades\DB;
Trait TruncateTable
{
    public function truncate($table)
    {
      
        DB::table($table)->truncate();
      
    }
}