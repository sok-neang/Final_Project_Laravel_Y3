<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);  //child table: relationship one to many
    }
    
    public function user(){
        return $this->belongsTo(User::class);  //child table: relationship one to many
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);  //Parents table: relationship many to many
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('storage/'.$this->thumbnail),
        );
    }
}