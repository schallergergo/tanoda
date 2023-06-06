<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competition>
 */
class CompetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            "duration_in_days"=>3,
            "organiser_id"=>1,
            "registration_fee"=>5000,
            "registration_start"=>fake()->datetime(),
            "registration_end"=>fake()->datetime(),
            "cover_image_url"=>"http://www.deakgyor.hu/images/Logok/logo2020rg_188_200.jpg",
            "evaluation_start"=>fake()->datetime(),
            "evaluation_end"=>fake()->datetime(),
            "comment"=>fake()->text(),
           
            "stand_description_hu"=>fake()->text(),
            "stand_description_en"=>fake()->text(),

        ];
    }
}
