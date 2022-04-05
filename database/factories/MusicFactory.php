<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'author' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(2,7),
            'published' => $this->faker->numberBetween(1998,2022),
            'genre_id' => Genre::factory(),
            'user_id' => User::factory(),
           
        ];
    }
}
