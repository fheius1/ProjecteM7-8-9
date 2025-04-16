<?php

namespace Tests\Unit;

use App\Models\Series;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function serie_have_videos()
    {

        $series = Series::factory()->create([
            'user_name' => 'Test User',
        ]);


        $videos = Video::factory()->count(3)->create([
            'series_id' => $series->id,
            'title' => 'Test Video Title',
        ]);


        $this->assertCount(3, $series->videos);


        foreach ($videos as $video) {
            $this->assertTrue($series->videos->contains($video));
        }
    }
}
