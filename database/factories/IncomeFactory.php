<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'incate_id' => 1,
            'income_title' => fake()->sentence($nbWord = 4, $variableNbWords = true),
            'income_date' => fake()->date('d-m-y'),
            'income_amount' => rand(10000,1000000),
            'income_creator' => 1,
            'income_slug' => 'IN'.Str::random(10),
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
