<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $thumbnails=['database.png','node.png','php.png','programming.jpg','python.jpeg' ];
        $categories = Category::pluck('id')->toArray();
        return [
            'user_id' => 1, // Assuming the user with ID 1 exists
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'description' => $this->faker->text(500), // Optional description
            'thumbnail' => 'uploads/'.$this->faker->randomElement($thumbnails),
            'category_id' => $this->faker->randomElement($categories),
        ];
    }
    
    public function configure(){
        $tags = Tag::pluck('id')->toArray();

        return $this->afterCreating(function (Post $post)  use($tags){
            $post->tags()->sync(fake()->randomElements($tags, 2)); // Attach 2 random tags
        });
    }
}