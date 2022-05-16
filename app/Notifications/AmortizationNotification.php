<?php

namespace App\Notifications;

use App\Models\Amortization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AmortizationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected Amortization $amortization;

    public function __construct(Amortization $amortization)
    {
        $this->amortization = $amortization;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('An payment was created with reference' . $this->amortization->reference . '.')
            ->action('View details', route('api.show',$this->amortization))
            ->line('Thanks for your purchase!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
