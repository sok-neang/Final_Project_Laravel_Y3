<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class Tag extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Post::class);  //Parents table: relationship many to many
    }

    public function categories(){
        return $this->belongsToMany(Category::class);  //Parents table: relationship many to many
    }
}