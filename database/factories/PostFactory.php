<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'image' => fake()->imageUrl(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title, '-'),
            'content' => fake()->paragraph(),
            'category_id' => fn () => Category::query()->inRandomOrder()->first()?->id ?? Category::factory()->create()->id,
            'user_id' => fn () => User::query()->inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            'published_at' => fake()->optional()->dateTime(),

        ];
    }
}
