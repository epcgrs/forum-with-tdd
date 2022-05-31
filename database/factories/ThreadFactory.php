<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'body'  => $this->faker->paragraphs(3, true),
            'user_id' => function() {
                return User::factory()->create()->getKey();
            }
        ];
    }
}
