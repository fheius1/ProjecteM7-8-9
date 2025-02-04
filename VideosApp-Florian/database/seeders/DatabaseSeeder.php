<?php

namespace Database\Seeders;

use App\Helpers\CreacioUsuari;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Video;
use App\Helpers\DefaultVideos;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Video::truncate();

        CreacioUsuari::crearUsuari();

        DefaultVideos::getDefaultValues();
    }

    /**
     * Create a regular user.
     */
    public function create_regular_user(): void
    {
        User::create([
            'name' => 'regular',
            'email' => 'regular@videosapp.com',
            'password' => bcrypt('123456789'),
        ]);
    }


}



