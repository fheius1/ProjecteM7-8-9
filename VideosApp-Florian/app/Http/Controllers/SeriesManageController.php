<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;

class SeriesManageController extends Controller
{
    /**
     * Mostra la llista de series
     */
    public function index()
    {
        $series = Series::all();
        return view('series.manage.index', compact('series'));
    }


    public function create()
    {
        $users = User::all();
        return view('series.manage.create', compact('users'));
    }

    /**
     * Guarda una nocva serie
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Series::create($validatedData);

        return redirect()->route('series.manage.index');
    }

    /**
     * Formulari per editar una serie
     */
    public function edit($id)
    {
        $serie = Series::findOrFail($id);
        $users = User::all();
        return view('series.manage.edit', compact('serie', 'users'));
    }

    /**
     * Actualitza la serie especificada.
     */
    public function update(Request $request, series $series)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'user_name' => 'required|string|max:255',
            'user_photo_url' => 'nullable|url',
            'published_at' => 'nullable|date',
        ]);

        $series->update($validated);

        return redirect()->route('series.manage.index');
    }

    /**
     * Suprimeix suaument la sèrie especificada.
     */
    public function delete(Series $series)
    {
        $series->delete();

        return redirect()->route('series.manage.index');
    }

    public function confirmDelete(Series $series)
    {
        return view('series.manage.delete', ['serie' => $series]);
    }



    /**
     * Esborra la serie especificada de manera permanent.
     */
    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.manage.index');
    }

    /**
     * Mostra els usuaris que han provat la serie.
     */
    public function testedBy(Series $series)
    {
        $users = $series->testedBy;
        return view('series.testedby', compact('series', 'users'));
    }
}
