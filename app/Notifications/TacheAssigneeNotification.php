<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TacheAssigneeNotification extends Notification
{
    use Queueable;

    public $tache;

    public function __construct(Tache $tache)
    {
        $this->tache = $tache;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'tache_id' => $this->tache->id,
            'titre' => $this->tache->titre,
            'projet' => $this->tache->projet->titre
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Une nouvelle tâche vous a été assignée.')
            ->action('Voir la tâche', route('projets.show', $this->tache->projet_id));
    }
}
