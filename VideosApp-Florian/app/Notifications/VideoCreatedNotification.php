<?php
namespace App\Notifications;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VideoCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public Video $video;

    public function __construct(Video $video) {
        $this->video = $video;
    }

    public function via($notifiable){
        return ['mail', 'database'];
    }

    public function toMail($notifiable){
        return (new MailMessage)
            ->subject('Nou video')
            ->line('Un nou video ha estat creat.')
            ->line('Titul: ' . $this->video->title)
            ->action('Veure video', url('/videos/' . $this->video->id));
    }

    public function toArray($notifiable){
        return [
            'video_id' => $this->video->id,
            'title' => $this->video->title,
            'description' => $this->video->description,
        ];
    }
}
