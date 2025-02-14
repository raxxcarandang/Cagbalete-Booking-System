<?php
	
	namespace App\Notifications;
	
	use Illuminate\Bus\Queueable;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Notifications\Messages\MailMessage;
	use Illuminate\Notifications\Notification;
	
	class NewNotification extends Notification
	{
		use Queueable;
		
		protected $data; // Custom data for the notification
		
		/**
			* Create a new notification instance.
			*
			* @param array $data
		*/
		public function __construct(array $data)
		{
			$this->data = $data;  // Store data passed to the constructor
		}
		
		/**
			* Get the notification's delivery channels.
			*
			* @param  mixed  $notifiable
			* @return array<int, string>
		*/
		public function via($notifiable)
		{
			return ['mail']; // Set to mail as the delivery channel
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
			->line('You have a new notification.')
			->action($this->data['action_text'], url($this->data['url'])) // Dynamic data passed to the email
			->line($this->data['message']); // Display dynamic message
		}
		
		/**
			* Get the array representation of the notification.
			*
			* @param  mixed  $notifiable
			* @return array<string, mixed>
		*/
		public function toArray($notifiable)
		{
			return [
            'message' => $this->data['message'], // Store dynamic message in the database
            'url' => $this->data['url'], // Store URL
            'action_text' => $this->data['action_text'], // Store action text
			];
		}
	}
