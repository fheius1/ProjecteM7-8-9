<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class VideosManageControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_with_permissions_can_manage_videos()
    {
        $this->loginAsVideoManager();

        $response = $this->get(route('videos.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function regular_users_cannot_manage_videos()
    {
        $this->loginAsRegularUser();

        $response = $this->get(route('videos.index'));

        $response->assertStatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_videos()
    {
        $response = $this->get(route('videos.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function superadmins_can_manage_videos()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get(route('videos.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function loginAsVideoManager()
    {
        Role::create(['name' => 'video-manager']);
        Permission::create(['name' => 'manage videos']);
        $user = User::factory()->create();
        $user->assignRole('video-manager');
        $user->givePermissionTo('manage videos');
        $this->actingAs($user);

        $this->assertTrue($user->hasRole('video-manager'));
    }

    /** @test */
    public function loginAsSuperAdmin()
    {
        Role::create(['name' => 'super-admin']);
        Permission::create(['name' => 'manage videos']);
        $user = User::factory()->create();
        $user->assignRole('super-admin');
        $user->givePermissionTo('manage videos');
        $this->actingAs($user);

        $this->assertTrue($user->hasRole('super-admin'));
    }

    /** @test */
    public function loginAsRegularUser()
    {
        Role::create(['name' => 'regular-user']);
        $user = User::factory()->create();
        $user->assignRole('regular-user');
        $this->actingAs($user);

        $this->assertTrue($user->hasRole('regular-user'));
    }
}
