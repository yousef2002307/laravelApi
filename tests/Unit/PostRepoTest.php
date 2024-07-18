<?php

namespace Tests\Unit;

use App\Repostories\PostRepostories as PostRepostories;
use Tests\TestCase;
use App\Models\Post;
use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\PostController;
class PostRepoTest extends TestCase
{
    /**
     * A basic unit test example.
     */
   public function test_create(){
    $rep = $this->app->make(PostRepostories::class);
    $payload = [
        'title' => 'test',
        'body' => 'test',
        
    ];
    $result = $rep->create($payload);
    $this->assertSame($payload['title'], $result->title,"tset failed");
   }


   public function test_update(){
    //env
    $rep = $this->app->make(PostRepostories::class);
    $dummypost = Post::factory(1)->create()[0]; //because it return a collection ratherthan model instance
    //source of truth
    $payload = [
        'title' => 'test',
       
        
    ];
    $result = $rep->update($payload,$dummypost);
    $this->assertSame($payload['title'], $result->title,"update tset failed");
   }

public function test_delete_unexcisted_recored2(){
    $rep = $this->app->make(PostController::class);
    $rep2 = $this->app->make(PostRepostories::class);
    $dummypost = Post::factory()->make()->first(); //because it return a collection ratherthan model instance
    $this->expectException(GeneralJsonException::class);
    $deleted = $rep->destroy($dummypost->id,$rep2);
 
   
}

   public function test_delete(){
    $rep = $this->app->make(PostRepostories::class);
    $dummypost = Post::factory(1)->create()[0]; //because it return a collection ratherthan model instance
    $result = $rep->delete($dummypost);
    $founded = Post::find($dummypost->id);
    $this->assertSame(null, $founded,"delete tset failed");
   }
}
