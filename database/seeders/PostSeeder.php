<?php

namespace Database\Seeders;

use Database\Seeders\Traits\ForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\CommentFactory;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helper\Helper;
class PostSeeder extends Seeder
{
    use TruncateTable,ForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
      $this->disable();
        $this->truncate('posts');
        $posts = \App\Models\Post::factory(300)->untitled()->create();
        $posts->each(function (Post $post){
        
          $helper = new Helper;
          $post->users()->sync([ $helper->returnid(User::class) ]);
        });
        $this->enable();
    }
}
