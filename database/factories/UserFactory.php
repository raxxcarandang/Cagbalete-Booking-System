<?php
	namespace Database\Factories;
	
	use App\Models\User;
	use Illuminate\Database\Eloquent\Factories\Factory;
	use Illuminate\Support\Facades\Hash;
	use Faker\Provider\en_US\PhoneNumber;
	
	class UserFactory extends Factory
	{
		protected $model = User::class;
		
		public function definition()
		{
			return [
            'name' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'bdate' => $this->faker->date(),
            'contactno' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'region' => $this->faker->state(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->optional()->dateTime(),
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('password'), 
            'role_id' => $this->faker->numberBetween(1),
            'remember_token' => $this->faker->optional()->sha256(),
            'created_at' => now(),
            'updated_at' => now(),
			];
		}
		    /**
		* Indicate that the model's email address should be unverified.
	*/
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
		'email_verified_at' => null,
        ]);
	}

	}
	
	

