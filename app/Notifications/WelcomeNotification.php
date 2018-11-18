<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('Welcome E-mail')
                    ->greeting('Confirm Email')
                    ->line('Welcome to ' . env('APP_NAME') . '!')
                    ->line('You should receive an email with a link to verify your account.')
                    ->line('Click the Verify Email Address Button in the mail and you are good to go.')
                    ->line('Thank you for choosing us!');
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
            'type'      => 'New Account',
            'message'   => 'Welcome ' . $this->user->uname . '. Your account has been successfully created. Click the link in the mail sent to your email to verify your account.'
        ];
    }
}
