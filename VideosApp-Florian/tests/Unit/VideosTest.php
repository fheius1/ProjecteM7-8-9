<?php

namespace Tests\Unit;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_formatted_published_at_date()
    {
        $video = Video::create([
            'title' => 'Video-1',
            'description' => 'Video-1',
            'url' => 'http://example.com/Video-1.mp4',
            'published_at' => now(),
        ]);

        $this->assertEquals(now()->format('F j, Y'), $video->formatted_published_at);
    }

    /** @test */
    public function can_get_formatted_published_at_date_when_not_published()
    {
        $video = Video::create([
            'title' => 'Video-2',
            'description' => 'Video-2',
            'url' => 'http://example.com/Video-2.mp4',
            'published_at' => null,
        ]);

        $this->assertEquals('Not Published', $video->formatted_published_at);
    }
}
