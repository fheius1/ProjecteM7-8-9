<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideosManageController extends Controller
{
    /**
     * Llista de videos
     */
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Mostrar un video en concret
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    /**
     * Guardar un video
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
        ]);

        $video = Video::create($validatedData);
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Editar un video
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    /**
     * Actualitzar el video
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
        ]);

        $video = Video::findOrFail($id);
        $video->update($validatedData);
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Eliminar un video
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('videos.index');
    }


    public function testedBy($id)
    {
        $video = Video::findOrFail($id);
        $users = $video->testedByUsers;
        return response()->json($users);
    }
}
