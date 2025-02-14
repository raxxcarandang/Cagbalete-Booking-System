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
			Schema::create('images', function (Blueprint $table) {
				$table->id();
				$table->foreignId('accid')->constrained('accommodations');
				$table->int('sequence', 254);
				$table->string('name', 254);
				$table->date('date', 254);
				$table->timestamps();
			});
			
				DB::unprepared("
            CREATE TRIGGER after_image_insert
            AFTER INSERT ON images
            FOR EACH ROW
            BEGIN
			UPDATE watchers
			SET total = total + 1;
			WHERE id = 4;
            END;
			");
			
			DB::unprepared("
            CREATE TRIGGER after_image_update
            BEFORE UPDATE ON images
            FOR EACH ROW
            BEGIN
			IF OLD.updated_at <> NEW.updated_at THEN
			UPDATE watchers
			SET totalupdates = totalupdates + 1;
			WHERE id = 4;
			END IF;
            END;
			");
			
			DB::unprepared("
            CREATE TRIGGER after_image_delete
            AFTER DELETE ON images
            FOR EACH ROW
            BEGIN
			UPDATE watchers
			SET total = total - 1;
			WHERE id = 4;
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
			Schema::dropIfExists('images');
		}
	};
