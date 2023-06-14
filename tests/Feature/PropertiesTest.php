<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertiesTest extends TestCase
{
    /**
     * @test
     */
    public function it_test_property_owner_has_access_to_properties(): void
    {
        $owner = User::factory()->create(['role_id' => Role::ROLE_OWNER]);
        $response = $this->actingAs($owner)->getJson('api/owner/properties');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_test_property_owner_does_not_have_access_to_properties(): void
    {
        $owner = User::factory()->create(['role_id' => Role::ROLE_USER]);
        $response = $this->actingAs($owner)->getJson('api/owner/properties');

        $response->assertStatus(403);
    }
}
