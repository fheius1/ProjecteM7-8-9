<?php
namespace Tests\Unit;

use App\Helpers\CreacioUsuari;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function prova_crear_usuari()
    {
        $user = CreacioUsuari::crearUsuari();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Florex', $user->name);
        $this->assertEquals('fheius@iesebre.com', $user->email);
        $this->assertTrue(\Hash::check('contra', $user->password));
    }

    /** @test */
    public function creacio_video_defecte()
    {
        $video = Video::create([
            'title' => 'Overrated-We fell apart',
            'description' => 'descripcio',
            'url' => 'https://www.youtube.com/watch?v=QPm9TkXqktQ&list=PLprjp5fe5eTmGkEAyWvsuWGdxcWS_UNho',
        ]);

        $this->assertInstanceOf(Video::class, $video);
        $this->assertEquals('Overrated-We fell apart', $video->title);
        $this->assertEquals('descripcio', $video->description);
        $this->assertEquals('https://www.youtube.com/watch?v=QPm9TkXqktQ&list=PLprjp5fe5eTmGkEAyWvsuWGdxcWS_UNho', $video->url);
    }
}
