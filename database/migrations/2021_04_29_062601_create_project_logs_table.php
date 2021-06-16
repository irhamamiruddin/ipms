<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id',false);
            $table->string('nature',500);
            $table->date('log_date');
            $table->string('log_desc',3000);
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
        Schema::dropIfExists('project_logs');
    }
}
