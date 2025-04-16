<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Backup the existing data
        $series = DB::table('series')->get();

        // Drop the table
        Schema::dropIfExists('series');

        // Recreate the table without the `user_name` column
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('user_photo_url')->nullable(); // Add the user_photo_url column
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Restore the data (excluding `user_name`)
        foreach ($series as $serie) {
            DB::table('series')->insert([
                'id' => $serie->id,
                'title' => $serie->title,
                'description' => $serie->description,
                'user_id' => $serie->user_id,
                'user_photo_url' => $serie->user_photo_url ?? null, // Restore user_photo_url if available
                'published_at' => $serie->published_at ?? null,
                'created_at' => $serie->created_at,
                'updated_at' => $serie->updated_at,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
