<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\VideoCreated;


class VideosController extends Controller
{
    /**
     * Show a specific video.
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.manage.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url',
        ]);

        $video = new Video([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'user_id' => Auth::id(),
        ]);

        if ($video->save()) {

//            event(new VideoCreated($video));

            return redirect()->route('videos.manage.index');
        } else {
            return redirect()->route('videos.manage.create');
        }
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






