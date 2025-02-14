<?php
	
	namespace Database\Factories;
	
	use App\Models\Booking;
	use Illuminate\Database\Eloquent\Factories\Factory;
	
	class Booking extends Factory
	{
		protected $model = Booking::class;
		
		public function definition()
		{
			return [
            'userid' => \App\Models\User::inRandomOrder()->first()->id, 
            'accommodation' => $this->faker->word(),
            'accproof' => $this->faker->word(),
            'arrival' => $this->faker->date(),
            'departure' => $this->faker->date(),
            'foreigners' => $this->faker->numberBetween(1, 20),
            'filipinos' => $this->faker->numberBetween(1, 20),
            'maubanins' => $this->faker->numberBetween(1, 20),
            'totalmale' => $this->faker->numberBetween(1, 20),
            'totalfemale' => $this->faker->numberBetween(1, 20),
            'totalvisitors' => $this->faker->numberBetween(1, 50),
            'specialneeds' => $this->faker->numberBetween(1, 5),
            'zeroto7yold' => $this->faker->numberBetween(1, 5),
            'thirteento50yold' => $this->faker->numberBetween(1, 20),
            'above60yold' => $this->faker->numberBetween(1, 5),
            'travelmeans' => $this->faker->word(),
            'parking' => $this->faker->word(),
            'parkproof' => $this->faker->word(),
            'boating' => $this->faker->word(),
            'boatproof' => $this->faker->word(),
            'purpose' => $this->faker->word(),
            'itinerary' => $this->faker->word(),
			'status' => $this->faker->randomElement(['PENDING', 'RESCHEDULED', 'CANCELLED', 'ARRIVED', 'DELINQUENT']),
            'remark' => $this->faker->sentence(),
            'amount' => $this->faker->numberBetween(80, 1000),
            'discount' => $this->faker->numberBetween(0, 500),
            'namount' => $this->faker->numberBetween(80, 1000),
            'color' => $this->faker->word(),
			];
		}
	}
