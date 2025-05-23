<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    /**
     * Llista completa de series
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $series = Series::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->get();

        return view('series.index', compact('series'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_id' => 'nullable|exists:videos,id',
        ]);

        $series = new Series([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video_id' => $request->input('video_id'),
            'user_id' => Auth::id(),
        ]);

        if ($series->save()) {
            return redirect()->route('series.index');
        } else {
            return redirect()->route('series.manage.create');
        }
    }

    public function create()
    {
        $users = User::all();
        $videos = Video::all();
        return view('series.manage.create', compact('users', 'videos'));
    }


    /**
     * Informacio especifica d'una serie
     */
    public function show(Series $series)
    {

        $series->load('videos');

        return view('series.show', ['serie' => $series]);
    }


}
