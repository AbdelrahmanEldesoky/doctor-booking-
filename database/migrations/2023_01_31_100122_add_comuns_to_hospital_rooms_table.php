<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComunsToHospitalRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_rooms', function (Blueprint $table) {
            $table->string('type_ar')->nullable();
            $table->string('price_outsider')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_rooms', function (Blueprint $table) {
            $table->dropColumn(['type_ar','price_outsider']);
        });
    }
}
