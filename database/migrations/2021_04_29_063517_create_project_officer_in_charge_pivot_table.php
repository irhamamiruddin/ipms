<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectOfficerInChargePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_officer_in_charge_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id',false);
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
        Schema::dropIfExists('project_officer_in_charge_pivot');
    }
}