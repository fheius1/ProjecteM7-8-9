<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

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


    /**
     * Informacio especifica d'una serie
     */
    public function show(Series $series)
    {
        return view('series.show', ['serie' => $series]);
    }


}
