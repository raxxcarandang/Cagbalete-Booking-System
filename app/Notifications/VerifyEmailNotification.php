<?php
	
	namespace App\Notifications;
	
	use Illuminate\Bus\Queueable;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Notifications\Messages\MailMessage;
	use Illuminate\Notifications\Notification;
	use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
	
	class VerifyEmailNotification extends VerifyEmailBase
	{
		use Queueable;
		
		/**
			* Create a new notification instance.
		*/
		public function __construct()
		{
			//
		}
		
		/**
			* Get the notification's delivery channels.
			*
			* @return array<int, string>
		*/
		public function via($notifiable)
		{
			return ['mail'];
		}
		
		/**
			* Get the mail representation of the notification.
		*/
		public function toMail($notifiable)
		{
			return (new MailMessage)
			->greeting('Greetings, ' . $notifiable->name)
			->line('Thanks for signing up! To complete your registration, please verify your email address by clicking the button below.')
			->action('Verify Email Address', $this->verificationUrl($notifiable))
			->line('If you did not create an account, no action is required.')
			->salutation('Best regards, Mauban Tourism');
		}
		
		/**
			* Get the array representation of the notification.
			*
			* @return array<string, mixed>
		*/
		public function toArray(object $notifiable): array
		{
			return [
            //
			];
		}
	}
