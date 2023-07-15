<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobTitleColumnToUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_information', function (Blueprint $table) {
            // $table->text('job_title')->nullable();
            $table->integer('rate_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_information', function (Blueprint $table) {
            $table->dropColumn(['rate_count']);
        });
    }
}
