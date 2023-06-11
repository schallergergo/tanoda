<?php

namespace Tests\Feature\Auth;
use  Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    //use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->post('api/auth/register', [
            'name' => 'Test User',
            'email' => fake()->email(),
            'password' => 'password1',
            'password_confirmation' => 'password1',
        ]);
        //dd($response);
        $response->assertStatus(200);
        //$this->assertAuthenticated();
        $data=$response["data"];
        $response->assertNoContent();
    }
}
