<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'description' => fake()->text($maxNbChars = 200),
            'priority' => fake()->randomElement($array = array ('low','medium','high', 'urgent')),
            'status' => fake()->randomElement($array = array ('draft','open','in progress', 'completed')),
            'end_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'user_id' => User::all()->random()->id,
        ];
    }
}
