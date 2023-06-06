<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\MailResetPasswordNotification as Notification; 

class MailResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
      $this->token = $token;  //
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
    // public function toMail($notifiable)
    // {
    //    $link = url( "/password/reset/" . $this->token );
    //     return (new MailMessage)
    //     ->subject('Wadhim password reset')
    //     ->greeting('You are receiving this email because we received a password reset request for your account.')
    //     ->line('Click the button to rest your password')
    //     ->action('Reset password', $link)
    //     ->line('Thank you for using our application!');
    }
    public function toMail($notifiable)
    {
    $locale = app()->getLocale();
    return (new MailMessage)
    ->subject('Reset your password - ' . config('app.name'))
    ->line('Hey this email was sent to you because you requested a password change for your order.')
    ->action('Reset Password', url($locale . '/password/reset', $this->token))
    ->line(' if you did not request a password change, please ignore this email.');
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
