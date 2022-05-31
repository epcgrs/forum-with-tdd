<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraphs(1, true),
            'user_id'  => function() {
                return User::factory()->create()->getKey();
            },
            'thread_id' => function() {
                return Thread::factory()->create()->getKey();
            }
        ];
    }
}
