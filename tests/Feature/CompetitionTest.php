<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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


        $response->assertJson([
                'status' => 200,
            ]);
    }
}
