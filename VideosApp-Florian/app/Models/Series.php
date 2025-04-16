<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Series extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'user_id'];


    /**
     * Definir la relació 1:N amb el model de vídeo.
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Definir la relació per als usuaris que han provat la sèrie.
     */
    public function testedBy()
    {
        return $this->belongsToMany(User::class, 'series_tested_by', 'series_id', 'user_id');
    }

    /**
     * Accessor per formatar l'atribut created_at.
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

    /**
     * Accessor per formatar l'atribut created_at per a humans.
     */
    public function getFormattedForHumansCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Accessor per obtenir l'atribut created_at com a timestamp.
     */
    public function getCreatedAtTimestampAttribute()
    {
        return $this->created_at->timestamp;
    }
}
