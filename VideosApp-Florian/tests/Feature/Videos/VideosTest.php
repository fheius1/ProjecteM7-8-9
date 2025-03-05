<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Creacio de permisos
        Permission::create(['name' => 'manage videos']);
    }

    /** @test */
    public function users_can_view_videos()
    {
        $video = Video::create([
            'title' => 'Video-3',
            'description' => 'Video-3',
            'url' => 'http://example.com/Video-3.mp4',
            'published_at' => now(),
        ]);

        $response = $this->get('/videos/' . $video->id);
        $response->assertStatus(200);
        $response->assertSee($video->title);
        $response->assertSee($video->description);
        $response->assertSee($video->url);
    }

    /** @test */
    public function users_cannot_view_not_existing_videos()
    {
        $response = $this->get('/videos/999');

        $response->assertStatus(404);
    }

    /** @test */
    public function user_without_permissions_can_see_default_videos_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/videos/manage');
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_see_default_videos_page()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('manage videos');
        $this->actingAs($user);

        $response = $this->get('/videos/manage');
        $response->assertStatus(200);
    }

    /** @test */
    public function not_logged_users_can_see_default_videos_page()
    {
        $response = $this->get('/videos');
        $response->assertRedirect('/login');
    }
}
