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
            "registration_fee"=>5000,
            "registration_start"=>fake()->datetime(),
            "registration_end"=>fake()->datetime(),
            "cover_photo_url"=>"http://www.deakgyor.hu/images/Logok/logo2020rg_188_200.jpg",
            "evaluation_start"=>fake()->datetime(),
            "evaluation_end"=>fake()->datetime(),
            "comment"=>fake()->text(),
            "stand_templete"=>"https://uni-archiv.sze.hu/files/targytematika/LGB_BM007_1/2020_21_2_LGB_BM007_1_0.pdf",
            "stand_description_hu"=>fake()->text(),
            "stand_description_en"=>fake()->text(),

        ];
    }
}
