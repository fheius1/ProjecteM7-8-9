<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class CreacioUsuari
{
    public static function crearUsuari()
    {
        $user = User::create([
            'name' => 'Florex',
            'email' => 'fheius@iesebre.com',
            'password' => Hash::make('contra'),
        ]);

        Gate::authorize('view', $user);

        // Crear un equip per l'usuari
        self::creacioEquip($user);

        return $user;
    }

    protected static function creacioEquip(User $user)
    {
        // Crear un equip per l'usuari
        return $user->ownedTeams()->create([
            'name' => "{$user->name}'s Team",
            'personal_team' => true,
        ]);
    }

    public static function crearUsuariRegular()
    {
        $user = User::create([
            'name' => 'regular',
            'email' => 'regular@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);

        // Crear un equip per l'usuari
        self::creacioEquip($user);

        return $user;
    }

    public static function crearUsuariVideoManager()
    {
        $user = User::create([
            'name' => 'Video Manager',
            'email' => 'videosmanager@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);

        // Crear un equip per l'usuari
        self::creacioEquip($user);

        return $user;
    }

    public static function crearUsuariSuperAdmin()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@videosapp.com',
            'password' => Hash::make('123456789'),
            'super_admin' => true,
        ]);

        // Crear un equip per l'usuari
        self::creacioEquip($user);

        return $user;
    }

    public static function create_default_professor()
    {
        // Check if the Super Admin user already exists
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@videosapp.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('123456789'), 'super_admin' => true]
        );

        $professor = User::create([
            'name' => 'Default Professor',
            'email' => 'professor@videosapp.com',
            'password' => Hash::make('123456789'),
            'super_admin' => true,
        ]);

        // Assign the superadmin to the professor
        $professor->superadmin_id = $superadmin->id;
        $professor->save();

        // Create a team for the professor
        self::creacioEquip($professor);

        return $professor;
    }

    public static function create_default_alumne()
    {
        $alumne = User::create([
            'name' => 'Default Alumne',
            'email' => 'alumne@videosapp.com',
            'password' => Hash::make('123456789'),
            'super_admin' => false,
        ]);

        // Crear un equip per l'usuari
        self::creacioEquip($alumne);

        return $alumne;
    }
}
