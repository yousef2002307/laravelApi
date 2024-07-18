<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Repostories\PostRepostories;
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
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,PostRepostories $rep)
    {
       $created =$rep->create($request->only(['title','body','user_id']));
      
       return
       new PostResource($created);
   
    }

    /**
     * Display the specified resource.
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
     */
    public function update(Request $request, Post $id,PostRepostories $rep)
    {
    
        $updated =  $rep->update($request->only(['title','body','user_id']),$id);
        return new PostResource($id);
    }

    /**
     * Remove the specified resource from storage.
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
