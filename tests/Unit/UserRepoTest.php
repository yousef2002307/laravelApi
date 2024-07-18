<?php

namespace Tests\Unit;

use App\Repostories\UserRepostories as UserRepostories ;
use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Models\User;
class UserRepoTest extends TestCase
{
    /**
     * A basic unit test example.
     */
   public function test_create(){
    // $rep = $this->app->make( UserRepostories::class);
    // $payload = [
    //     'name' => 'test',
    //     'email' => 'teswqw2t@gmail.comm',
    //     'password' => 'test',
        
    // ];
    // $result = $rep->create($payload);
    // $this->assertSame($payload['name'], $result->name,"tset failed");
   }


   public function test_update(){
    //env
    $rep = $this->app->make(UserController::class);
    $dummypost = User::factory(1)->create()[0]; //because it returns a collection rather than a model instance

    //source of truth
    $payload = [
        'name' => 'test',
    ];

    $request = \Illuminate\Http\Request::create('', 'POST', $payload);

    $result = $rep->update($request, $dummypost);

    $this->assertSame($payload['name'], $result->name, "Update test failed");

   }
   


   public function test_delete(){
    
   }
}
