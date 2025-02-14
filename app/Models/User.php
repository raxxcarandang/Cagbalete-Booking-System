<?php
	
	namespace App\Models;
	
	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Auth\Notifications\VerifyEmail;
	use Illuminate\Notifications\Notifiable;
	use App\Notifications\VerifyEmailNotification;
	use App\Models\Booking;
	
	class User extends Authenticatable implements MustVerifyEmail
	{
		use HasFactory, Notifiable;
		
		/**
			* The attributes that are mass assignable.
			*
			* @var array<int, string>
		*/
		public function sendEmailVerificationNotification()
		{
			$this->notify(new VerifyEmailNotification());
		}
		
		public function bookings() {
			return $this->hasMany(Booking::class, 'userid');  
		}
		
		protected $fillable = [
        'name',
		'mname',
        'lname',
        'gender',
        'bdate',
        'contactno',
        'country',
        'region',
        'email',
        'password',
		];
		
		/**
			* The attributes that should be hidden for serialization.
			*
			* @var array<int, string>
		*/
		protected $hidden = [
        'password',
        'remember_token',
		];
		
		/**
			* Get the attributes that should be cast.
			*
			* @return array<string, string>
		*/
		protected function casts(): array
		{
			return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
			];
		}
		
		/**
			* Interact with the user's first name.
			*
			* @param  string  $value
			* @return \Illuminate\Database\Eloquent\Casts\Attribute
		*/
		protected function type(): Attribute
		{
			return new Attribute(
			get: fn ($value) =>  $value == 2 ? "admin" : "user",
			);
		}
	}
