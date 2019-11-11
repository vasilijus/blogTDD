<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    
    /** @test */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(\App\User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

}
