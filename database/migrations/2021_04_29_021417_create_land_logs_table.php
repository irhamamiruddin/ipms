<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('land_id',false)->nullable();
            $table->string('nature',500)->nullable();
            $table->date('log_date')->nullable();
            $table->string('log_desc',3000)->nullable();
            $table->string('level_1',500)->nullable();
            $table->string('level_2',500)->nullable();
            $table->string('level_3',500)->nullable();
            $table->boolean('report')->nullable();
            $table->date('reminder_date')->nullable();
            $table->boolean('reminder_date_noty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_logs');
    }
}
