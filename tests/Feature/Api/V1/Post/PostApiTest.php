<?php

namespace Tests\Feature\Api\V1\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
class PostApiTest extends TestCase
{
   # use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
       $data = Post::factory(10)->create();
       #$postids = $data->map(fn ($post) => $post->id);

       $response = $this->json('GET', '/api/v1/posts');
//assert status
       $response->assertStatus(200);
//verify records
       $data = $response->json('data');
      # collect($data)->each(fn($post) => $this->assertTrue( in_array($post->id,$postids->toArray())));
       dump($data);

    }


    public function test_show(): void
    {
        #replicate env
        $data = Post::factory()->create();
        #send get request to show endpoint
        $response = $this->json('GET', '/api/v1/posts/'.$data->id);
        #assert status
        $result =$response->assertStatus(200)->json('data');
        $this->assertEquals(data_get($result,'id'),$data->id);
    }

    public function test_create(): void
    {
        $dummy = Post::factory()->make();
        $response = $this->json('POST', '/api/v1/posts', $dummy->toArray());
        $result = $response->assertStatus(201)->json('data');
        $result = collect($result)->only(array_keys($dummy->getAttributes()));
        $result->each(function ($value, $field) use ($dummy) {
            $this->assertEquals($dummy->{$field}, $value);
        });
    }
    
}
