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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('eventName');
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->datetime('eventDate')->nullable();
            $table->datetime('startTimeMorning')->nullable();
            $table->datetime('endTimeMorning')->nullable();
            $table->integer('gracePeriodMorning')->nullable();
            $table->datetime('startTimeAfternoon')->nullable();
            $table->datetime('endTimeAfternoon')->nullable();
            $table->integer('gracePeriodAfternoon')->nullable();
            $table->string('eventType')->nullable(); // WholeDay or HalfDay
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
