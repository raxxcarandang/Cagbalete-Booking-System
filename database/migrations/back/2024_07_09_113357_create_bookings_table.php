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
            $table->string('boating', 254);
            $table->string('purpose', 254);
            $table->string('itinerary', 254);
            $table->string('status', 50);
            $table->string('remark', 512);
            $table->timestamps();
        });

        
        DB::unprepared("
            CREATE TRIGGER after_booking_insert
            AFTER INSERT ON bookings
            FOR EACH ROW
            BEGIN
                UPDATE watchers
                SET total = total + 1
                WHERE id = 2;
            END;
        ");

        DB::unprepared("
            CREATE TRIGGER after_booking_update
            BEFORE UPDATE ON bookings
            FOR EACH ROW
            BEGIN
                IF OLD.updated_at <> NEW.updated_at THEN
                    UPDATE watchers
                    SET totalupdates = totalupdates + 1
                    WHERE id = 2;
                END IF;
            END;
        ");

        DB::unprepared("
            CREATE TRIGGER after_booking_delete
            AFTER DELETE ON bookings
            FOR EACH ROW
            BEGIN
                UPDATE watchers
                SET total = total - 1
                WHERE id = 2;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS after_booking_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS after_booking_update");
        DB::unprepared("DROP TRIGGER IF EXISTS after_booking_delete");

        Schema::dropIfExists('bookings');
    }
};
