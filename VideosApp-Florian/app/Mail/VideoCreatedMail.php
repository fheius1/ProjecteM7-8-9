<?php
namespace App\Mail;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VideoCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public Video $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Construir el missatge de correu.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Video creat amb el nom: ' . $this->video->title)
            ->view('emails.video_created')
            ->with([
                'title' => $this->video->title,
                'description' => $this->video->description,
                'url' => $this->video->url,
            ]);
    }
}
