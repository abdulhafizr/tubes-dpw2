<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id');
            $table->string('nis', 50);
            $table->string('name', 100);
            $table->string('address', 255);
            $table->string('place_of_birth', 100);
            $table->date('date_of_birth');
            $table->string('phone', 50);
            $table->enum('gender', ['L', 'P']);
            $table->string('photo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
