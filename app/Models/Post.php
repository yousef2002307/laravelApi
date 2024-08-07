<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
class Post extends Model
{
    use HasFactory;
    protected $cats = [
        "body" => "array"

    ];
    protected $guarded = [];
    protected $appends = ["title_upper",'body_array'];
    public function getTitleUpperAttribute(){
        return ucfirst($this->title);
    }
    public function getBodyArrayAttribute(){
        return json_decode($this->attributes["body"]);
    }

    public function setTitleAttribute($value){
        $this->attributes["title"] = strtolower($value);
    }
    public function comments():HasMany{
        return $this->hasMany(Comment::class,"post_id","id");
    }

    public function users():BelongsToMany{
        return $this->belongsToMany(User::class,"post_user","post_id","user_id");
    }

}
