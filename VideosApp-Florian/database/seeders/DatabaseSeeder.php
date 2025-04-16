<?php

namespace Database\Seeders;

use App\Helpers\CreacioUsuari;
use App\Helpers\DefaultSeries;
use App\Models\Series;
use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Video;
use App\Helpers\DefaultVideos;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        Team::truncate();
        User::truncate();
        Video::truncate();
        Series::truncate();
        Role::truncate();
        Permission::truncate();



        // Cracio de permissos
        CreacioUsuari::create_video_permissions();
        CreacioUsuari::create_user_management_permission();
        CreacioUsuari::create_series_management_permission();

        // Creacio usuaris
        $superAdmin = CreacioUsuari::crearUsuariSuperAdmin();
        $regularUser = CreacioUsuari::crearUsuariRegular();
        $videoManager = CreacioUsuari::crearUsuariVideoManager();
        $defaultProfessor = CreacioUsuari::create_default_professor();
        $defaultAlumne = CreacioUsuari::create_default_alumne();

        // Assignacio de roles a usuaris
        $superAdmin->assignRole('super-admin');
        $videoManager->assignRole('video-manager');
        $regularUser->assignRole('video-manager');

        DefaultVideos::getDefaultValues();
        DefaultSeries::create_default_series();
    }
}
