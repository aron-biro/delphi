<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
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
            'price' => fake()->randomDigit(),
            'started_at' => Carbon::now()->toDate(),
            'ended_at' => Carbon::now()->addWeek()->toDate(),
            'available_from' => '12',
            'available_until' => '18',
            'description' => fake()->text(),
            'duration' => 4,
        ];
    }
}
