<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration
	{
		/**
			* Run the migrations.
		*/
		public function up(): void
		{
			Schema::create('accommodations', function (Blueprint $table) {
				$table->id();
				$table->integer('ownerid');
				$table->string('owner');
				$table->string('cla', 254);
				$table->string('ornum', 254);
				$table->string('dot', 254);
				$table->string('name', 254);
				$table->string('rooms', 254);
				$table->string('description');
				$table->string('thumbnail', 254);
				$table->string('slider', 254);
				$table->string('type', 254);
				$table->string('lodge', 254);
				$table->string('address');
				$table->string('contactno', 128);
				$table->integer('capacity');
				$table->integer('fee');
				
				$table->timestamps();
			});
			
			
			
		}
		
		/**
			* Reverse the migrations.
		*/
		public function down(): void
		{
		
			Schema::dropIfExists('accommodations');
		}
	};
