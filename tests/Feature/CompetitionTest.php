<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;



use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\Competition;
use App\Models\User;

class CompetitionTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_competitiom_can_be_retrieved()
    {
        $newCompetition=Competition::factory()->create()->first();
        $response = $this->get('/api/competition/'.$newCompetition->id.'/show');
        $response->assertStatus(200);
        $response->assertJson([
                'success' => true,

            ]);
    }



    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_competition_has_data()
    {
        $competition=Competition::factory()->create()->first();

        $response = $this->get('/api/competition/'.$competition->id.'/show');
        $response->assertStatus(200);
        $response->assertJsonPath('data.name', $competition->name);

    }

     public function test_competition_can_be_deleted_as_admin()
    {   


        $user = User::factory()->create(["name"=>"GEGE","role"=>"admin"]);
        $newCompetition=Competition::factory()->create(["organiser_id"=>$user->id]);
        $response = $this->actingAs($user)->get('/api/competition/'.$newCompetition->id.'/delete');

        $response->assertStatus(200);
        $response->assertJson([
                'success' => true,

            ]);

    }
}




