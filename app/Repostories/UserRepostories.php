<?php


namespace App\Repostories;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repostories\BaseRepostories;
use Illuminate\Http\Request;
use App\Events\UserCreated;
class UserRepostories extends BaseRepostories
{
    public function create($attrs){
      return  DB::transaction(function () use ($attrs) {
            $created = User::query()->create([
                "name"=>data_get($attrs,'name'),
                "email"=>data_get($attrs,'email'),
                "password" => data_get($attrs,'password'),
               ]);
               if($post_id = data_get($attrs,'post_id')){
               $created->posts()->sync($post_id);
               }
               event(new UserCreated($created));
               return $created;
        });
    }
    public function update($model,$attrs){

    }
    public function delete($model){

    }



 }