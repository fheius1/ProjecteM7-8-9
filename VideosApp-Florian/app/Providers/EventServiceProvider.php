<?php
namespace App\Providers;

use App\Events\VideoCreated;
use App\Listeners\SendVideoCreatedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        VideoCreated::class => [
            SendVideoCreatedNotification::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
