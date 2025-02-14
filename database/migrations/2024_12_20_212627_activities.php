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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
			$table->integer('userid');
			$table->integer('adminid')->nullable();
			$table->integer('bookid');
			$table->string('type')->nullable();
            $table->string('updatemsg', 512);
			$table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

