<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OnlinePeriod>
 */
class OnlinePeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "team_id"=>1,
            "start"=>fake()->datetime(),
            "end"=>fake()->datetime(),

        ];
    }
}
