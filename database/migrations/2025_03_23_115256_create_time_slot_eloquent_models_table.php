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
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->string('slot_duration');
            $table->time('start_time'); 
            $table->time('end_time'); 
            $table->foreignId('arena_id')->constrained()->onDelete('cascade'); 
            $table->enum('status',['available','pending','booked'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_slot_eloquent_models');
    }
};
