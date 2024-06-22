<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;
use App\Models\User;
class Comment extends Model
{
    use HasFactory;
    protected $cats = [
        "body" => "array"

    ];
    public function post():BelongsTo{
        return $this->belongsTo(Post::class,"post_id","id");
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class,"comment_id","id");
    }
}
