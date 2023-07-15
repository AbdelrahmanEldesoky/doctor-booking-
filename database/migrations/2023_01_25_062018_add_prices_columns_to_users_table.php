<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('online_price')->default(0);
            $table->string('ofline_price')->default(0);
            $table->string('online_price_outside')->default(0);
            $table->string('ofline_price_outside')->default(0);
            $table->string('waiting_time')->nullable();
            $table->string('cs_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['online_price','ofline_price','online_price_outside','ofline_price_outside','waiting_time','cs_number']);
        });
    }
}
