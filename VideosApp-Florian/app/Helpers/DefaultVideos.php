<?php

namespace App\Helpers;
use App\Models\Video;

class DefaultVideos
{
    public static function getDefaultValues()
    {
        // Video 1
        Video::create([
            'title' => 'Video 1',
            'description' => 'Descripcio video 1',
            'url' => 'https://www.youtube.com/embed/85VQEzwzAvE?list=PLprjp5fe5eTmGkEAyWvsuWGdxcWS_UNho',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);

        // Video 2
        Video::create([
            'title' => 'Video 2',
            'description' => 'Descripcio video 2',
            'url' => 'https://www.youtube.com/embed/nISmASW8byM?si=eL4tvAP5w0-bQdYY',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);

        // Video 3
        Video::create([
            'title' => 'Video 3',
            'description' => 'Descripcio video 3',
            'url' => 'https://www.youtube.com/embed/85VQEzwzAvE?list=PLprjp5fe5eTmGkEAyWvsuWGdxcWS_UNho',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);
    }
}
