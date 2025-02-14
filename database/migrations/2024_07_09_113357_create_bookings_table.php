<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration
	{
		/**
			* Run the migrations.
		*/
		public function up(): void
		{
			Schema::create('bookings', function (Blueprint $table) {
				$table->id();
				$table->foreignId('userid')->constrained('users');
				$table->string('accommodation', 254);
				$table->string('accproof', 254);
				$table->date('arrival');
				$table->date('departure');
				$table->integer('foreigners');
				$table->integer('filipinos');
				$table->integer('maubanins');
				$table->integer('totalmale');
				$table->integer('totalfemale');
				$table->integer('totalvisitors');
				$table->integer('specialneeds');
				$table->integer('zeroto7yold');
				$table->integer('thirteento50yold');
				$table->integer('above60yold');
				$table->string('travelmeans', 254);
				$table->string('parking', 254);
				$table->string('parkproof', 254)->nullable();
				$table->string('boating', 254);
				$table->string('boatproof', 254);
				$table->string('purpose', 254);
				$table->string('itinerary', 254);
				$table->string('status', 50);
				$table->string('remark', 512);
				$table->integer('amount');
				$table->integer('discount');
				$table->integer('namount');
				$table->string('color', 24);
				$table->timestamps();
			});
			
			
			
		}
		
		/**
			* Reverse the migrations.
		*/
		public function down(): void
		{
			
			
			Schema::dropIfExists('bookings');
		}
	};
