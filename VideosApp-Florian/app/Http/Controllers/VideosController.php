<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (!Auth::check()) {
            return redirect()->route('login');
        }


        if (Auth::user()->can('manage videos')) {
            $videos = Video::all();
            return view('videos.index', compact('videos'));
        }

        // Si l'usuari no te permisos, dona l'error 403
        abort(403);
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






