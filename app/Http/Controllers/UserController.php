<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Http\Resources\UserResource;

use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = User::query()->get();
        return UserResource::collection($posts);
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
            $created = User::query()->create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password" => $request->password
               ]);
               $created->posts()->sync($request->post_id);
               return $created;
        });
      
       return
       new UserResource($created);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(   Request $request,User $id)
    {
      
        return new UserResource($id);
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
    public function update(Request $request, User $id)
    {
        $updated = $id->update([
           "name"=>$request->name ?? $id->name,
                "email"=>$request->email ?? $id->email,
                "password" => $request->password ?? $id->password
         ]);
  
         return new UserResource($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
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
