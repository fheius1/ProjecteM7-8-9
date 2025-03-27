<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UsersManageController extends Controller
{
    /**
     * Llista d'usuaris.
     */
    public function index()
    {
        $users = User::all();
        return view('users.manage.index', compact('users'));
    }

    /**
     * Formulari creacio ususari.
     */
    public function create()
    {
        return view('users.manage.create');
    }

    /**
     * Guardar usuari.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the manage users page with a success message
        return redirect()->route('users.manage.index');
    }

    /**
     * Formulari edicio usuari.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.manage.edit', compact('user'));
    }

    /**
     * Actualitzar usuari.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);


        $user = User::findOrFail($id);


        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];


        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }


        $user->save();

        // Redirect to the manage users page with a success message
        return redirect()->route('users.manage.index');
    }

    /**
     * Esborrar usuari
     */
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.manage.index');
    }
}
