<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->get();
        return CommentResource::collection($comments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = Comment::query()->create([
            "post_id" => $request->post_id,
            "user_id" => $request->user_id,
            "body" => $request->body
         ]);
         return new CommentResource($created);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(   Request $request,Comment $id)
    {
      
        return new CommentResource($id);
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
    public function update(Request $request, Comment $id)
    {
       $updated = $id->update([
          'user_id' => $request->user_id ?? $id->user_id,
          'post_id' => $request->post_id ?? $id->post_id,
          'body' => $request->body??$id->body,
       ]);

       return new CommentResource($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $id)
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
