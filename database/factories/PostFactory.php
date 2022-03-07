<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $rand = rand(-2, 10);
        $rand2 = rand(5, 50);

        return [
            'title' => $this->faker->text($rand2),
            'author' => $this->faker->name,
            'published_at' => Carbon::now()->subDays($rand),
        ];
    }
}
