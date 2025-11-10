<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Condition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bitacora>
 */
class BitacoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'day' => \Illuminate\Support\Facades\Date::now()->dayName,
            'time_of_test' => \Illuminate\Support\Facades\Date::now()->format('H:i:s'),
            'glucose' => $this->faker->randomDigitNotZero(),
            'condition' => $this->faker->randomElement(Condition::cases()),
            'food' => $this->faker->sentence(),
        ];
    }
}
