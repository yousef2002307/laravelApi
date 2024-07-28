<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Repostories\PostRepostories;
use Illuminate\Support\Facades\Validator;
use App\Rules\StrLen;
/**
 *@group post managment 
 * 
 * api to manage post resources
 * 
 * @apiResourceCollection App\Http\Resources\PostResource
 * @apiResourceModel App\Models\Post
 * @return ResouceCollection
**/
class PostController extends Controller
{
    public function index(Request $request)
    {
        
        $pagesize = $request->input('pagesize',3);
        $posts = Post::query()->paginate($pagesize);
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @bodyParam title string required The title of the post
     * @bodyParam body string required The body of the post
     * @bodyParam user_id int required The user id of the post
      * @apiResourceCollection App\Http\Resources\PostResource
    * @apiResourceModel App\Models\Post
     */
    public function store(Request $request,PostRepostories $rep)
    {
        $vali = Validator::make($request->only(['title','body','user_id']),[
            'title' => ['required','string',
            new StrLen()
            

        ],
            'body' => ['required'],
],
    [
        'title.required' => 'Title is required',
        'body.required' => 'Body is required',
        
    ],
    [
        'title' => "jo title"
    ],
    );
    $vali->after(function(\Illuminate\Validation\Validator $vali){
        dump("khuih kb");
    });
    $vali->validate();
    
   
       $created =$rep->create($request->only(['title','body','user_id']));
      
       return
       new PostResource($created);
   
    }

    /**
     * Display the specified resource.
     * 
     * @urlParam id_id int required The ID of the post. Example: 122
      * @apiResourceCollection App\Http\Resources\PostResource
    * @apiResourceModel App\Models\Post
     */
    public function show(   Request $request,Post $id)
    {
      
       return new PostResource($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @urlParam id_id int required The ID of the post. Example: 122
      * @apiResourceCollection App\Http\Resources\PostResource
    * @apiResourceModel App\Models\Post
     */
    public function update(Request $request, Post $id,PostRepostories $rep)
    {
    
        $updated =  $rep->update($request->only(['title','body','user_id']),$id);
        return new PostResource($id);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @urlParam id_id int required The ID of the post. Example: 122
      * @response 200 {
      * "data": "succes in deleteing post"
      }
    * @apiResourceModel App\Models\Post
     */
    public function destroy( $id,PostRepostories $post)
    {
        if(Post::find($id) == null){
            throw new GeneralJsonException('not found',400);
        }else{
            $id = Post::find($id);
        $updated = $post->delete($id);
        return new JsonResponse([
            "data"=>"succes in deleteing post"
        ]);
    }
    }
}
