<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'expcate_id' => 1,
            'expense_title' => fake()->name(),
            'expense_date' => fake()->date('d-m-y'),
            'expense_amount' => rand(1000,110000),
            'expense_creator' => 1,
            'expense_slug' => uniqid(),
            'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
