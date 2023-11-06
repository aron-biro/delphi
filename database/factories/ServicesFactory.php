<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 4,
            'title' => 'Service ' . $this->faker->randomNumber(),
            'price' => $this->faker->randomDigit(),
            'started_at' => Carbon::now(),
            'ended_at' => Carbon::now()->addWeek(),
            'available_from' => '12',
            'available_until' => '18',
            'description' => $this->faker->text(),
            'duration' => 4,
        ];
    }
}
