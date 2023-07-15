<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClinicColumnToDoctorAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_areas', function (Blueprint $table) {
            $table->foreignId('clinic_id')->nullable()->references('id')->on('doctor_clinics')->onDelete('cascade');
            $table->string('type')->default('main');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_areas', function (Blueprint $table) {
        $table->dropForeign(['clinic_id']);
        $table->dropColumn(['clinic_id','type']);
        });
    }
}
