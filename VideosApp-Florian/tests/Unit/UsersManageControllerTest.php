<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersManageControllerTest extends TestCase
{
    use RefreshDatabase;


    private function loginAsSuperAdmin(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('administradorUsuaris');
        $this->actingAs($user);
    }



    private function loginAsRegularUser(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }


    /** @test */
    public function user_with_permissions_can_see_add_users()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get(route('users.manage.create'));

        $response->assertStatus(200);
        $response->assertViewIs('users.manage.create');
        $response->assertSee('Add User');
    }

    /** @test */
    public function user_without_users_manage_create_cannot_see_add_users()
    {
        $this->loginAsRegularUser();

        $response = $this->get(route('users.manage.create'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function user_with_permissions_can_store_users()
    {
        $this->loginAsSuperAdmin();

        $response = $this->post(route('users.manage.store'), [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('users.manage.index'));
        $this->assertDatabaseHas('users', ['email' => 'newuser@example.com']);
    }

    /** @test */
    public function user_without_permissions_cannot_store_users()
    {
        $this->loginAsRegularUser();

        $response = $this->post(route('users.manage.store'), [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function user_with_permissions_can_destroy_users()
    {
        $this->loginAsSuperAdmin();
        $user = User::factory()->create();

        $response = $this->delete(route('users.manage.destroy', $user->id));

        $response->assertRedirect(route('users.manage.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    /** @test */
    public function user_without_permissions_cannot_destroy_users()
    {
        $this->loginAsRegularUser();
        $user = User::factory()->create();

        $response = $this->delete(route('users.manage.destroy', $user->id));

        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_see_edit_users()
    {
        $this->loginAsSuperAdmin();
        $user = User::factory()->create();

        $response = $this->get(route('users.manage.edit', $user->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_permissions_cannot_see_edit_users()
    {
        $this->loginAsRegularUser();
        $user = User::factory()->create();

        $response = $this->get(route('users.manage.edit', $user->id));

        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_update_users()
    {
        $this->loginAsSuperAdmin();
        $user = User::factory()->create();

        $response = $this->put(route('users.manage.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
        ]);

        $response->assertRedirect(route('users.manage.index'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
    }

    /** @test */
    public function user_without_permissions_cannot_update_users()
    {
        $this->loginAsRegularUser();
        $user = User::factory()->create();

        $response = $this->put(route('users.manage.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
        ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_manage_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('users.manage.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function regular_users_cannot_manage_users()
    {
        $this->loginAsRegularUser();
        $response = $this->get(route('users.manage.index'));
        $response->assertStatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_users()
    {
        $response = $this->get(route('users.manage.index'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function superadmins_can_manage_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('users.manage.index'));
        $response->assertStatus(200);
    }
}
