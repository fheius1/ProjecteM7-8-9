<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
}
