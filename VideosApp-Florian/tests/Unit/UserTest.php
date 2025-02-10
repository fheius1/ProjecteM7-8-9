<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_if_user_is_super_admin()
    {
        // Create the super-admin role
        Role::create(['name' => 'super-admin']);

        // Create a user and assign the super-admin role
        $user = User::factory()->create(['super_admin' => true]);
        $user->assignRole('super-admin');

        // Assert that the user is a super-admin
        $this->assertTrue($user->isSuperAdmin());
    }

    /** @test */
    public function it_checks_if_user_is_not_super_admin()
    {
        // Create a user without assigning any role
        $user = User::factory()->create(['super_admin' => false]);

        // Assert that the user is not a super-admin
        $this->assertFalse($user->isSuperAdmin());
    }
}
