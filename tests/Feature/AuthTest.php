<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * @test
     */
    public function it_registration_fails_with_admin_role(): void
    {
        $response =  $this->postJson(
            '/api/auth/register', [
                'name' => 'test user',
                'email' =>  'test@email.com',
                'password' => 'test1234',
                'password_confirmation' => 'test1234',
                'role_id' => Role::ROLE_ADMINISTRATOR,
            ]);

        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function it_registration_succeed_with_owner_role(): void
    {
        $response =  $this->postJson(
            '/api/auth/register', [
            'name' => 'test user',
            'email' =>  'test@email.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234',
            'role_id' => Role::ROLE_OWNER,
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'access_token'
        ]);
    }

    /**
     * @test
     */
    public function it_registration_succeed_with_user_role(): void
    {
        $response =  $this->postJson(
            '/api/auth/register', [
            'name' => 'test user',
            'email' =>  'test@email.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234',
            'role_id' => Role::ROLE_USER,
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'access_token'
        ]);
    }
}
