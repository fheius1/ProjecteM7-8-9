<?php

namespace App\Helpers;

use App\Models\Series;
use App\Models\User;
use App\Models\Video;

class DefaultSeries
{
    /**
     * Create 3 default series with associated videos.
     */
    public static function create_default_series()
    {
        $user = User::first(); // Retrieve the first user from the database
        $video = Video::first(); // Retrieve the first video from the database

        $userId = $user ? $user->id : null; // Use the user's ID or null if no user exists
        $videoId = $video ? $video->id : null; // Use the video's ID or null if no video exists

        if (!$userId) {
            throw new \Exception('No users found in the database. Please create a user first.');
        }

        if (!$videoId) {
            throw new \Exception('No videos found in the database. Please create a video first.');
        }

        Series::create([
            'title' => 'Serie 1',
            'description' => 'Descripcio serie 1',
            'user_id' => $userId,
            'video_id' => $videoId,
            'user_photo_url' => 'https://example.com/user1.jpg',
            'published_at' => now()
        ]);

        Series::create([
            'title' => 'Serie 2',
            'description' => 'Descripcio serie 2',
            'user_id' => $userId,
            'video_id' => $videoId,
            'user_photo_url' => 'https://example.com/user2.jpg',
            'published_at' => now(),
        ]);

        Series::create([
            'title' => 'Serie 3',
            'description' => 'Descripcio serie 3',
            'user_id' => $userId,
            'video_id' => $videoId,
            'user_photo_url' => 'https://example.com/user3.jpg',
            'published_at' => now(),
        ]);
    }
}
