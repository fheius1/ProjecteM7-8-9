<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Info usuari especific.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $videoCount = $user->videos()->count();
        return view('users.show', compact('user', 'videoCount'));
    }

    /**
     * Llista d'usuaris.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->get();
        return view('users.index', compact('users'));
    }


}
