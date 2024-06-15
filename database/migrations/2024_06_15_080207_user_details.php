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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('studentId');
            $table->string('birthday');
            $table->string('yearlevel');
            $table->string('course');
            $table->string('userType');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamps();
        });

        $userId = DB::table('users')->where('email', 'admin@admin.com')->value('id');

        DB::table('user_details')->insert([
            [
                'firstname' => 'Admin',
                'middlename' => '',
                'lastname' => 'User',
                'studentId' => 'admin001',
                'birthday' => 'N/A',
                'yearlevel' => 'N/A',
                'course' => 'N/A',
                'userType' => 'admin',
                'userId' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
