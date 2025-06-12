<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Tag;

class Category extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);  //Parents table: relationship one to many
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);  //Parents table: relationship many to many
    }
}