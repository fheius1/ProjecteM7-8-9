<?php

namespace Tests\Unit;

use App\Helpers\CreacioUsuari;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Validation\ValidationException;

class CreacioTest extends TestCase
{
    use RefreshDatabase;

    public function testUsuari()
    {
        $user = (new CreacioUsuari)->crearUsuari([
            'name' => config('defaultusers.user.name'),
            'email' => config('defaultusers.user.email'),
            'password' => config('defaultusers.user.password'),
        ]);

        $this->assertEquals(config('defaultusers.user.name'), $user->name);
        $this->assertEquals(config('defaultusers.user.email'), $user->email);
        $this->assertTrue(\Hash::check(config('defaultusers.user.password'), $user->password));
        $this->assertNotEquals(config('defaultusers.user.password'), $user->password);
        $this->assertCount(1, $user->ownedTeams);
        $this->assertDatabaseHas('users', ['email' => config('defaultusers.user.email')]);
        $this->assertDatabaseHas('teams', ['name' => "{$user->name}'s Team", 'user_id' => $user->id]);
        $this->assertNotNull($user->ownedTeams->first());
        $this->assertEquals($user->current_team_id, $user->ownedTeams->first()->id); // Check if current_team_id is set correctly
    }

    public function testProfessor()
    {
        $user = (new CreacioUsuari)->crearUsuari([
            'name' => config('defaultusers.professor.name'),
            'email' => config('defaultusers.professor.email'),
            'password' => config('defaultusers.professor.password'),
        ]);

        $this->assertEquals(config('defaultusers.professor.name'), $user->name);
        $this->assertEquals(config('defaultusers.professor.email'), $user->email);
        $this->assertTrue(\Hash::check(config('defaultusers.professor.password'), $user->password));
        $this->assertNotEquals(config('defaultusers.professor.password'), $user->password);
        $this->assertCount(1, $user->ownedTeams);
        $this->assertDatabaseHas('users', ['email' => config('defaultusers.professor.email')]);
        $this->assertDatabaseHas('teams', ['name' => "{$user->name}'s Team", 'user_id' => $user->id]);
        $this->assertNotNull($user->ownedTeams->first());
        $this->assertEquals($user->current_team_id, $user->ownedTeams->first()->id); // Check if current_team_id is set correctly
    }

    public function testEmailUnic()
    {
        $this->expectException(ValidationException::class);

        (new CreacioUsuari)->crearUsuari([
            'name' => config('defaultusers.user.name'),
            'email' => config('defaultusers.user.email'),
            'password' => config('defaultusers.user.password'),
        ]);

        (new CreacioUsuari)->crearUsuari([
            'name' => 'Another User',
            'email' => config('defaultusers.user.email'),
            'password' => 'anotherpassword',
        ]);
    }
}
