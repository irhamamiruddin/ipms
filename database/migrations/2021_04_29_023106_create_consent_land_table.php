<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consent_land', function (Blueprint $table) {
            $table->unsignedInteger('land_id',false);
            $table->unsignedInteger('consent_id',false);
            $table->date('signing_date')->nullable();
            $table->date('stamping_date')->nullable();
            $table->string('instrument_no',255)->nullable();
            $table->date('instrument_registered_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consent_land');
    }
}
