<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandReliefOfficerInChargePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_relief_officer_in_charge_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('land_id',false);
            $table->unsignedInteger('user_id',false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_relief_officer_in_charge_pivot');
    }
}
