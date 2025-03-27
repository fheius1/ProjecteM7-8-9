<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        // Assignar permisos
        $user->givePermissionTo('videosManager');

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

        // Assign all permissions
        $user->givePermissionTo(Permission::all());

        // Create a team for the user
        self::creacioEquip($user);

        return $user;
    }

    public static function create_default_professor()
    {
        $professor = User::create([
            'name' => 'Default Professor',
            'email' => 'professor@videosapp.com',
            'password' => Hash::make('123456789'),
            'super_admin' => true,
        ]);

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

    public static function create_video_permissions()
    {
        $permissionName = 'videosManager';

        if (!Permission::where('name', $permissionName)->exists()) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        $roles = ['video-manager', 'super-admin'];
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            if (!$role->hasPermissionTo($permissionName)) {
                $role->givePermissionTo($permissionName);
            }
        }
    }

    public static function create_user_management_permission()
    {
        $permissionName = 'admmistradorUsuaris';

        if (!Permission::where('name', $permissionName)->exists()) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        if (!$superAdminRole->hasPermissionTo($permissionName)) {
            $superAdminRole->givePermissionTo($permissionName);
        }
    }





}
