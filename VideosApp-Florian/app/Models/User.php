<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Util\Test;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
//    use SoftDeletes;


//    protected static function boot()
//    {
//        parent::boot();
//
//        static::deleting(function ($user) {
//            $user->team()->delete();
//        });
//    }
//
//    public function team()
//    {
//        return $this->hasOne(Team::class);
//    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Define a relationship with the Test model.
     */
    public function testedBy()
    {
        return $this->hasMany(Test::class);
    }

    /**
     * Check if the user is a super admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->super_admin;
    }

    /**
     * Create a personal team for the user.
     */
    public function addPersonalTeam()
    {
        $team = Team::create([
            'user_id' => $this->id,
            'name' => "{$this->name}'s Team",
            'personal_team' => true,
        ]);

        $this->ownedTeams()->save($team);
        $this->switchTeam($team);
    }

    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }

    // User.php
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
