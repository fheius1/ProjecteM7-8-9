<?php

namespace App\Helpers;
use App\Models\Video;

class DefaultVideos
{

    public static function getDefaultValues()
    {
        return Video::create([
            'title' => 'Titul per defecte',
            'description' => 'Descripcio per defecte',
            'url' => 'https://www.youtube.com/embed/85VQEzwzAvE?list=PLprjp5fe5eTmGkEAyWvsuWGdxcWS_UNho',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);
    }
}
