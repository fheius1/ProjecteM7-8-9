<?php
namespace App\Listeners;
use App\Events\VideoCreated;
use App\Mail\VideoCreatedMail;
use App\Models\User;
use App\Notifications\VideoCreatedNotification;
use Illuminate\Support\Facades\Mail;
class SendVideoCreatedNotification
{
    /**
     * Gestionar l'esdeveniment.
     *
     * @param VideoCreated $event
     * @return void
     */
    public function handle(VideoCreated $event): void
    {
        $video = $event->video;


        $admins = User::where('is_admin', true)->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new VideoCreatedMail($video));
        }


        foreach ($admins as $admin) {
            $admin->notify(new VideoCreatedNotification($video));
        }

        // Transmetre l'event a través de Pusher
        broadcast(new VideoCreated($video));
    }
}
