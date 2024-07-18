<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        $email = $this->faker->email();
        $json_data = json_encode([
            "name" => $name,
            "email" => $email
        ]);
        return [
            "title" => $this->faker->sentence(),
            "body" => $json_data
        ];
    }

    public function untitled(){
        return $this->state(["title" => "none"]);
    }
}
