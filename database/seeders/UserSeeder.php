<?php

namespace Database\Seeders;

use Database\Seeders\Traits\ForeignKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Traits\TruncateTable;

class UserSeeder extends Seeder
{
    use TruncateTable,ForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $this->disable();
        $this->truncate('users');
        \App\Models\User::factory(10)->create();
     $this->disable();
    }
}
