<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory(1)->create(["email"=>"team@team.hu","password"=>Hash::make("teamteam"),"role"=>"team"]);
        \App\Models\User::factory(1)->create(["email"=>"admin@admin.hu","password"=>Hash::make("adminadmin"),"role"=>"admin"]);
        \App\Models\User::factory(1)->create(["email"=>"organiser@organiser.hu","password"=>Hash::make("organiser"),"role"=>"organiser"]);

        \App\Models\Competition::factory(10)->create();
        \App\Models\Judge::factory(1)->create();
        \App\Models\Team::factory(2)->create();
        \App\Models\TeamMember::factory(4)->create(["team_id"=>1]);
        \App\Models\TeamMember::factory(4)->create(["team_id"=>2]);
        \App\Models\Contact::factory(2)->create(["competition_id"=>1]);
        \App\Models\Contact::factory(2)->create(["competition_id"=>1]);
        \App\Models\OnlinePeriod::factory(2)->create(["team_id"=>1]);
        \App\Models\OnlinePeriod::factory(3)->create(["team_id"=>2]);
    
    }
}
