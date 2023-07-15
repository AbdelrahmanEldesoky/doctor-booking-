<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->string('speciality')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('hospital_rooms');
    }
}
