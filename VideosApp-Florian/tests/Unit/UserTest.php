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

    /** @test */
    public function user_without_permissions_can_see_default_users_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_with_permissions_can_see_default_users_page()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('manageUsers');

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertStatus(200);
    }


    /** @test */
    public function not_logged_users_cannot_see_default_users_page()
    {
        $response = $this->get(route('users.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function user_without_permissions_can_see_user_show_page()
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.show', $anotherUser->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_with_permissions_can_see_user_show_page()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('manageUsers');
        $anotherUser = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.show', $anotherUser->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function not_logged_users_cannot_see_user_show_page()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user->id));

        $response->assertRedirect(route('login'));
    }
}
