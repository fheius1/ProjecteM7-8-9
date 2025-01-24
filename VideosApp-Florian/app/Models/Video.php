<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'url', 'published_at', 'previous', 'next', 'series_id'
    ];

    protected $dates = ['published_at'];

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? Carbon::parse($this->published_at)->format('F j, Y') : 'Not Published';
    }

    public function getFormattedForHumansPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    public function getPublishedAtTimestampAttribute()
    {
        return Carbon::parse($this->published_at)->timestamp;
    }
}
