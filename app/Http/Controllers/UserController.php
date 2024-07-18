<?php
///////////////////note i did not implement repository///////////////////////
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Events\UserUpdated;
use Illuminate\Support\Facades\DB;
use App\Repostories\UserRepostories;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        event(new UserCreated(User::factory()->make()));
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
    public function store(Request $request,UserRepostories $rep)
    {
         $created =$rep->create($request->only(['name','email','password','post_id']));
           
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
        $updated = DB::transaction(function () use ($request,$id) {
            $updated = $id->update([
                "name"=>$request->name ?? $id->name,
                     "email"=>$request->email ?? $id->email,
                     "password" => $request->password ?? $id->password
              ]);
              if(!$updated){
               throw new \Exception("failed to update post");
             }
              if($post_id = $request->post_id){
                $id->posts()->sync($post_id);
             }
             event(new UserUpdated($id));
             return $updated;
        });
       
        
         
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
        event(new UserDeleted($id));
        return new JsonResponse([
            "data"=>"succes in deleteing post"
        ]);
   
    }
}
