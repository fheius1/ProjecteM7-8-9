<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Mostra un video en especific
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    /**
     * Display a list of users who have tested the video.
     */
    public function testedBy($id)
    {
        $video = Video::findOrFail($id);
        $users = $video->testedByUsers;
        return response()->json($users);
    }
}
