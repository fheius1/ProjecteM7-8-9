<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreacioUsuari
{
    public static function crearUsuari()
    {
        return User::create([
            'name' => 'Florex',
            'email' => 'fheius@iesebre.com',
            'password' => Hash::make('contra'),
        ]);
    }

    protected function creacioEquip(User $user)
    {
        // Create a team for the user and return it
        return $user->ownedTeams()->create([
            'name' => "{$user->name}'s Team",
            'personal_team' => true,
        ]);
    }

    public static function crearUsuariSuperAdmin()
    {
        return User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);
    }

    public static function crearUsuariRegular()
    {
        return User::create([
            'name' => 'regular',
            'email' => 'regular@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);
    }

    public static function crearUsuariVideoManager()
    {
        return User::create([
            'name' => 'Video Manager',
            'email' => 'videosmanager@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);
    }

    public static function create_default_professor()
    {
        $professor = User::create([
            'name' => 'Default Professor',
            'email' => 'professor@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);

        // Add the superadmin to the professor
        $superadmin = self::crearUsuariSuperAdmin();
        $professor->superadmin_id = $superadmin->id;
        $professor->save();

        return $professor;
    }
}
