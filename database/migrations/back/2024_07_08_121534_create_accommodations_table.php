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
				$table->foreignId('ownerid')->constrained('users');
				$table->string('name', 254);
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
			
			DB::unprepared("
            CREATE TRIGGER after_accommodation_insert
            AFTER INSERT ON accommodations
            FOR EACH ROW
            BEGIN
			UPDATE watchers
			SET total = total + 1;
			WHERE id = 3;
            END;
			");
			
			DB::unprepared("
            CREATE TRIGGER after_accommodation_update
            BEFORE UPDATE ON accommodations
            FOR EACH ROW
            BEGIN
			IF OLD.updated_at <> NEW.updated_at THEN
			UPDATE watchers
			SET totalupdates = totalupdates + 1;
			WHERE id = 3;
			END IF;
            END;
			");
			
			DB::unprepared("
            CREATE TRIGGER after_accommodation_delete
            AFTER DELETE ON accommodations
            FOR EACH ROW
            BEGIN
			UPDATE watchers
			SET total = total - 1;
			WHERE id = 3;
            END;
			");
			
		}
		
		/**
			* Reverse the migrations.
		*/
		public function down(): void
		{
			DB::unprepared("DROP TRIGGER IF EXISTS after_booking_delete");
			DB::unprepared("DROP TRIGGER IF EXISTS after_booking_update");
			DB::unprepared("DROP TRIGGER IF EXISTS after_booking_insert");
			Schema::dropIfExists('accommodations');
		}
	};
