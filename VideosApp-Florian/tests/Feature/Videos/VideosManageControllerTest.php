<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class VideosManageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles and permissions
        Role::create(['name' => 'video-manager']);
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'regular-user']);
        Permission::create(['name' => 'manage videos']);
    }

    /** @test */
    public function loginAsVideoManager()
    {
        $user = User::factory()->create();
        $user->assignRole('video-manager');
        $user->givePermissionTo('manage videos');
        $this->actingAs($user);

        $this->assertTrue($user->hasRole('video-manager'));
    }

    /** @test */
    public function loginAsSuperAdmin()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');
        $user->givePermissionTo('manage videos');
        $this->actingAs($user);

        $this->assertTrue($user->hasRole('super-admin'));
    }

    /** @test */
    public function loginAsRegularUser()
    {
        $user = User::factory()->create();
        $user->assignRole('regular-user');
        $this->actingAs($user);

        $this->assertTrue($user->hasRole('regular-user'));
    }

    /** @test */
    public function user_with_permissions_can_see_add_videos()
    {
        $this->loginAsVideoManager();

        $response = $this->get(route('videos.create'));
        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_videos_manage_create_cannot_see_add_videos()
    {
        $this->loginAsRegularUser();

        $response = $this->get(route('videos.create'));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_store_videos()
    {
        $this->loginAsVideoManager();

        $response = $this->post(route('videos.store'), [
            'title' => 'New Video',
            'description' => 'Video description',
            'url' => 'http://example.com/video.mp4',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('videos', ['title' => 'New Video']);
    }

    /** @test */
    public function user_without_permissions_cannot_store_videos()
    {
        $this->loginAsRegularUser();

        $response = $this->post(route('videos.store'), [
            'title' => 'New Video',
            'description' => 'Video description',
            'url' => 'http://example.com/video.mp4',
        ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_destroy_videos()
    {
        $this->loginAsVideoManager();

        $video = Video::factory()->create();

        $response = $this->delete(route('videos.destroy', $video->id));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('videos', ['id' => $video->id]);
    }

    /** @test */
    public function user_without_permissions_cannot_destroy_videos()
    {
        $this->loginAsRegularUser();

        $video = Video::factory()->create();

        $response = $this->delete(route('videos.destroy', $video->id));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_see_edit_videos()
    {
        $this->loginAsVideoManager();

        $video = Video::factory()->create();

        $response = $this->get(route('videos.edit', $video->id));
        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_permissions_cannot_see_edit_videos()
    {
        $this->loginAsRegularUser();

        $video = Video::factory()->create();

        $response = $this->get(route('videos.edit', $video->id));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_update_videos()
    {
        $this->loginAsVideoManager();

        $video = Video::factory()->create();

        $response = $this->put(route('videos.update', $video->id), [
            'title' => 'Updated Video',
            'description' => 'Updated description',
            'url' => 'http://example.com/updated_video.mp4',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('videos', ['title' => 'Updated Video']);
    }

    /** @test */
    public function user_without_permissions_cannot_update_videos()
    {
        $this->loginAsRegularUser();

        $video = Video::factory()->create();

        $response = $this->put(route('videos.update', $video->id), [
            'title' => 'Updated Video',
            'description' => 'Updated description',
            'url' => 'http://example.com/updated_video.mp4',
        ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_manage_videos()
    {
        $this->loginAsVideoManager();

        $videos = Video::factory()->count(3)->create();

        $response = $this->get(route('videos.index'));
        $response->assertStatus(200);
        $response->assertSee($videos[0]->title);
        $response->assertSee($videos[1]->title);
        $response->assertSee($videos[2]->title);
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
}
