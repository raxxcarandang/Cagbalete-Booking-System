<?php
	
	namespace Database\Factories;
	
	use App\Models\Booking;
	use Illuminate\Database\Eloquent\Factories\Factory;
	
	class BookingFactory extends Factory
	{
		protected $model = Booking::class;
		
		public function definition()
		{
			return [
            'userid' => \App\Models\User::inRandomOrder()->first()->id, 
            'accommodation' => $this->faker->randomElement([
			'Aquazul Hotel and Resort',
			'Dona Choleng Camping Resort',
			'Rio del Sol Beach Resort',
			'Jovencio`s Resort',
			'MVT Sto. Niño Beach Resort',
			'Nilandingan Cove Resort',
			'Villa Cleofas (Cagbalete Island Camping Resort)',
			'Villa Escaparde Camping and Beach Resort',
			'Villa Noe Beach Resort',
			'Villa Pilarosa Beach Resort',
			'Tita Pinay Beach Resort',
			'Aguho Playa Beach Resort',
			'Tent Place',
			'Orlan Beach Resort'
			]),
            'accproof' => $this->faker->word(),
            'arrival' => $this->faker->dateTimeBetween("2025-01-07", "2025-01-09")->format("Y-m-d"),
            'departure' => $this->faker->dateTimeBetween($startDate = "2025-01-10", $endDate = "2025-01-15")->format("Y-m-d"),
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
            'travelmeans' => $this->faker->randomElement(['Public Vehicle', 'Private Vehicle']),
            'parking' => $this->faker->randomElement(['Metropark Parking', 'Don Parking Rental', 'Taxi', 'Modern Jeep', 'Bus']),
            'parkproof' => $this->faker->word(),
            'boating' => $this->faker->randomElement(['Public Boat', 'Private Boat', 'Boat Provided by Resort']),
            'boatproof' => $this->faker->word(),
            'purpose' => $this->faker->randomElement(['Leisure', 'Business']),
            'itinerary' => $this->faker->randomElement(['DAY TOUR', 'OVERNIGHT', '2 NIGHTS', '3 NIGHTS', '4 NIGHTS', '5+ NIGHTS']),
			'status' => $this->faker->randomElement(['PENDING', 'ARRIVED', 'CANCELLED', 'DELINQUENT', 'RESCHEDULED']),
            'remark' => $this->faker->sentence(),
            'amount' => $this->faker->numberBetween(80, 1000),
            'discount' => $this->faker->numberBetween(0, 500),
            'namount' => $this->faker->numberBetween(80, 1000),
            'color' => $this->faker->colorName(),
			];
		}
	}
