<?php

namespace Tests\Feature\Video;

use Tests\TestCase;
use App\Models\User;
use App\Models\Video;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosManageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create the 'super-admin' role
        Role::create(['name' => 'super-admin']);
    }

    /** @test */
    public function user_with_permissions_can_manage_videos()
    {
        // Create a user with the 'super-admin' role
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        // Create a video
        $video = Video::factory()->create([
            'title' => 'Sample Video',
            'description' => 'This is a sample video description.',
            'url' => 'http://example.com/video.mp4',
        ]);

        // Act as the user and check if they can manage the video
        $response = $this->actingAs($user)->get('/videos/' . $video->id . '/edit');

        // Assert that the user can access the video management page
        $response->assertStatus(200);
        $response->assertSee('Sample Video');
        $response->assertSee('This is a sample video description.');
    }
}
