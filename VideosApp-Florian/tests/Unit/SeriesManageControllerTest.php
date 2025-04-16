<?php

namespace Tests\Unit;

use App\Models\Series;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesManageControllerTest extends TestCase
{
    use RefreshDatabase;

    private function loginAsVideoManager()
    {
        $user = User::factory()->create(['role' => 'video_manager']);
        $this->actingAs($user);
        return $user;
    }

    private function loginAsSuperAdmin()
    {
        $user = User::factory()->create(['role' => 'super_admin']);
        $this->actingAs($user);
        return $user;
    }

    private function loginAsRegularUser()
    {
        $user = User::factory()->create(['role' => 'regular_user']);
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function user_with_permissions_can_destroy_series()
    {
        $this->loginAsSuperAdmin();

        $series = Series::factory()->create();

        $response = $this->delete(route('series.manage.destroy', $series));

        $response->assertRedirect(route('series.manage.index'));
        $this->assertDatabaseMissing('series', ['id' => $series->id]);
    }

    /** @test */
    public function user_without_permissions_cannot_destroy_series()
    {
        $this->loginAsRegularUser();

        $series = Series::factory()->create();

        $response = $this->delete(route('series.manage.destroy', $series));

        $response->assertStatus(403);
        $this->assertDatabaseHas('series', ['id' => $series->id]);
    }

    /** @test */
    public function user_with_permissions_can_see_edit_series()
    {
        $this->loginAsVideoManager();

        $series = Series::factory()->create();

        $response = $this->get(route('series.manage.edit', $series));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_permissions_cannot_see_edit_series()
    {
        $this->loginAsRegularUser();

        $series = Series::factory()->create();

        $response = $this->get(route('series.manage.edit', $series));

        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_update_series()
    {
        $this->loginAsVideoManager();

        $series = Series::factory()->create();

        $response = $this->put(route('series.manage.update', $series), [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);

        $response->assertRedirect(route('series.manage.index'));
        $this->assertDatabaseHas('series', ['id' => $series->id, 'title' => 'Updated Title']);
    }

    /** @test */
    public function user_without_permissions_cannot_update_series()
    {
        $this->loginAsRegularUser();

        $series = Series::factory()->create();

        $response = $this->put(route('series.manage.update', $series), [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);

        $response->assertStatus(403);
        $this->assertDatabaseMissing('series', ['title' => 'Updated Title']);
    }

    /** @test */
    public function user_with_permissions_can_manage_series()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get(route('series.manage.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function regular_users_cannot_manage_series()
    {
        $this->loginAsRegularUser();

        $response = $this->get(route('series.manage.index'));

        $response->assertStatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_series()
    {
        $response = $this->get(route('series.manage.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function videomanagers_can_manage_series()
    {
        $this->loginAsVideoManager();

        $response = $this->get(route('series.manage.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function superadmins_can_manage_series()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get(route('series.manage.index'));

        $response->assertStatus(200);
    }
}
