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
            $table->datetime('eventStartDate')->nullable();
            $table->datetime('eventEndDate')->nullable();
            $table->string('startTimeAM')->nullable();
            $table->string('endTimeAM')->nullable();
            $table->integer('gracePeriodAM')->nullable();
            $table->string('startTimePM')->nullable();
            $table->string('endTimePM')->nullable();
            $table->integer('gracePeriodPM')->nullable();
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('user_details');
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
