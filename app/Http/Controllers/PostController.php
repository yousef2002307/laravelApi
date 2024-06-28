<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class PostController extends Controller
{
    public function index()
    {
        return new JsonResponse([
            "posts"=>Post::all()
        ]);
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
       $created = Post::query()->create([
        "title"=>$request->title,
        "body"=>$request->body
       ]);
       return
       new JsonResponse([
        "mesaage"=>"item has been created"
       ]);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(   Request $request,Post $id)
    {
      
        return new JsonResponse([
            "id"=>$id
        ]);
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
    public function update(Request $request, string $id)
    {
        return new JsonResponse([
            "id"=>'patch'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return new JsonResponse([
            "id"=>"del"
        ]);
   
    }
}
