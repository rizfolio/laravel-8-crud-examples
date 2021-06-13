<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5,true);
        $slug = Str::slug($title);
        $user = User::inRandomOrder()->first();
        return [
            //
            'title' => $title,
            'excerpt' => $this->faker->paragraphs(1,true),
            'content' => $this->faker->paragraphs(5,true),
            'user_id' => $user->id,
            'slug' =>$slug
        ];
    }
}
