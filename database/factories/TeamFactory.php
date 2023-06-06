<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id"=>1,
            "competition_id"=>1,
            "company_name"=>fake()->company(),
            "school_name"=>"Sz Egyetem",
            "school_address"=>"Győr",
            "scope_of_activities"=>"Sok minden",
            "available_in_hungarian"=>true,
            "available_in_english"=>true,
            "available_in_german"=>false
        ];
    }
}
