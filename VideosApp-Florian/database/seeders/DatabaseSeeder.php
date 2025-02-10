<?php

namespace Database\Seeders;

use App\Helpers\CreacioUsuari;
use App\Models\Team;
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


        // Create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $regularUserRole = Role::create(['name' => 'regular-user']);
        $videoManagerRole = Role::create(['name' => 'video-manager']);

        // Create users
        $superAdmin = CreacioUsuari::crearUsuariSuperAdmin();
        $regularUser = CreacioUsuari::crearUsuariRegular();
        $videoManager = CreacioUsuari::crearUsuariVideoManager();

        // Assign roles to users
        $superAdmin->assignRole($superAdminRole);
        $regularUser->assignRole($regularUserRole);
        $videoManager->assignRole($videoManagerRole);

        DefaultVideos::getDefaultValues();
    }
}
