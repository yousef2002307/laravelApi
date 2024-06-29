<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->get();
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
    public function store(Request $request)
    {
       $created = DB::transaction(function () use ($request) {
            $created = Post::query()->create([
                "title"=>$request->title,
                "body"=>$request->body
               ]);
               $created->users()->sync($request->user_id);
               return $created;
        });
      
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
    public function update(Request $request, Post $id)
    {
    
        $updated = $id->update([
            "title"=>$request->title ?? $id->title,
            "body" => $request->body ?? $id->body
        ]);
        if(!$updated){
            return new JsonResponse([
                "message"=>"failed to update post"
            ],400);
        }
        return new PostResource($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $id)
    {
        $updated = $id->forceDelete();
        if(!$updated){
            return new JsonResponse([
                "message"=>"failed to update post"
            ],400);
        }
        return new JsonResponse([
            "data"=>"succes in deleteing post"
        ]);
   
    }
}
