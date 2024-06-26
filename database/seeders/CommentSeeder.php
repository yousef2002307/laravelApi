<?php

namespace Database\Seeders;

use Database\Seeders\Traits\ForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class CommentSeeder extends Seeder
{
    use TruncateTable,ForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $this->disable();
        $this->truncate('comments');
        \App\Models\Comment::factory(10)->create();
        $this->enable();
    }
}
