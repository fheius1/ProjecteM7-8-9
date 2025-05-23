<?php
namespace App\Events;

use App\Models\Video;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Video $video;

    /**
     * Crear una nova instancia per al event
     *
     * @param Video $video
     */
    public function __construct(Video $video){
        $this->video = $video;
    }

    /**
     * Obtindre els canals on s'ha d'emetre l'esdeveniment.
     *
     * @return Channel|array
     */
    public function broadcastOn(){
        return new Channel('videos');
    }

    /**
     * Obtindre el nom de l'emissió de l'esdeveniment.
     *
     * @return string
     */
    public function broadcastAs(){
        return 'video.created';
    }
}
