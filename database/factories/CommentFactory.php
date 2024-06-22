<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $count = Post::query()->count();
        if($count == 0){
            $postid = Post::factory()->create()->id;
        }else{
            $postid = Post::query()->inRandomOrder()->first()->id;
        }


        $count2 = User::query()->count();
        if($count2 == 0){
            $userid = User::factory()->create()->id;
        }else{
            $userid = User::query()->inRandomOrder()->first()->id;
        }

        return [
           
            "body" => "[]",
            "user_id"=>$userid,
            "post_id" => $postid
        ];
    }
}
