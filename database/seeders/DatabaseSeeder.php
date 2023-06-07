<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Competition::factory(10)->create();
        \App\Models\Judge::factory(1)->create();
        \App\Models\Team::factory(2)->create();
        \App\Models\TeamMember::factory(4)->create(["team_id"=>1]);
        \App\Models\TeamMember::factory(4)->create(["team_id"=>2]);

    
    }
}
