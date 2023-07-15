<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()->references('id')->on('appointments')->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('patient_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('schedule_id')->nullable()->references('id')->on('schedules')->onDelete('cascade');
            
            $table->decimal('session_amount')->default(0);
            $table->decimal('paid_amount')->default(0);
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('reports');
    }
}
