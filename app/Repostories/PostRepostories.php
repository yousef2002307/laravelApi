<?php
namespace App\Repostories;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use App\Repostories\BaseRepostories;
class PostRepostories extends BaseRepostories{
    public function create($attrs){
       return DB::transaction(function () use ($attrs) {
            $created = Post::query()->create([
                "title"=>data_get($attrs,'title','untitled') ,
                "body"=>json_encode(data_get($attrs,'body'))
               ]);
               $created->users()->sync(data_get($attrs,'user_id'));
               return $created;
        });
    }
    public function update($attrs, $post){
        return DB::transaction(function () use ($attrs,$post) {
            $updated = $post->update([
                "title"=>data_get($attrs,'title',) ,
                "body"=>data_get($attrs,'body')
            ]);
            if(!$updated){
                throw new GeneralJsonException('not found',400);
            }
            if($user_id = data_get($attrs,'user_id')){
               $post->users()->sync($user_id);
            }
               return $post;
        });
    }

    public function delete( $id){
        if(!$id){
            throw new GeneralJsonException('not found',400);
        }
        $updated = $id->forceDelete();
       throw_if(!$updated,GeneralJsonException::class,'not found',400);
        return $updated;
    }

}