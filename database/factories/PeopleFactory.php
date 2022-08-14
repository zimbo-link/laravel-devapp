<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'surnname' => fake()->lastName(),
            'national_id' => fake()->numberBetween(6001010000000, 9901010000000),
            'email' => fake()->safeEmail(),
            'mobile_number' => '0' . fake()->numberBetween(820000000, 620000000),
            'birth_date' => fake()->date(),
            'language' => fake()->numberBetween(0, 2),
        ];
    }
}
