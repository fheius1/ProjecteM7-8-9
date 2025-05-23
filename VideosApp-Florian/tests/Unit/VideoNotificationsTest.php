<?php

namespace Tests\Unit;

use App\Events\VideoCreated;
use App\Models\Video;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class VideoNotificationsTest extends TestCase
{
    public function test_video_created_event_is_dispatched()
    {

        Event::fake();

        $video = Video::factory()->create();

        Event::assertDispatched(VideoCreated::class, function ($event) use ($video) {
            return $event->video->id === $video->id;
        });
    }

    public function test_push_notification_is_sent_when_video_is_created()
    {

        Notification::fake();

        $video = Video::factory()->create();
        event(new VideoCreated($video));


        Notification::assertSentTo(
            [$video->user],
            \App\Notifications\VideoCreatedNotification::class
        );
    }
}
