<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\Competition;

class CompetitionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_competitiom_can_be_retrieved()
    {
        $newCompetition=Competition::factory()->create();
        $response = $this->get('/api/competition/show/'.$newCompetition->id);
        $jsonData=$newCompetition["data"];

        $response->assertJson([
                'success' => true,

            ]);
    }



    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_competitiom_has_data()
    {
        $newCompetition=Competition::factory()->create();
        $response = $this->get('/api/competition/show/'.$newCompetition->id);

        $response->assertJsonPath('data.name', $newCompetition->name);

    }
     public function test_competitiom_can_be_deleted()
    {
        $newCompetition=Competition::factory()->create();
        $response = $this->get('/api/competition/delete/'.$newCompetition->id);

        $response->assertStatus(200);
        $response->assertJson([
                'success' => true,

            ]);

    }
}




