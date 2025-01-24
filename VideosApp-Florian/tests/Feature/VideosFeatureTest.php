<?php
namespace Tests\Feature;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosFeatureTest extends TestCase
{
use RefreshDatabase;

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
}
