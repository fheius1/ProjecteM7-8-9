<?php

namespace Database\Seeders;

use App\Helpers\CreacioUsuari;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Video;
use App\Helpers\DefaultVideos;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Video::truncate();
        Role::truncate();

        // Creacio rols
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $regularUserRole = Role::create(['name' => 'regular-user']);
        $videoManagerRole = Role::create(['name' => 'video-manager']);

        // Creacio permisos
        CreacioUsuari::create_video_permissions();

        // Create users
        $superAdmin = CreacioUsuari::crearUsuariSuperAdmin();
        $regularUser = CreacioUsuari::crearUsuariRegular();
        $videoManager = CreacioUsuari::crearUsuariVideoManager();
        $defaultProfessor = CreacioUsuari::create_default_professor();
        $defaultAlumne = CreacioUsuari::create_default_alumne();

        // Asignacio de rols
        $superAdmin->assignRole($superAdminRole);
        $regularUser->assignRole($regularUserRole);
        $videoManager->assignRole($videoManagerRole);

        DefaultVideos::getDefaultValues();
    }
}
