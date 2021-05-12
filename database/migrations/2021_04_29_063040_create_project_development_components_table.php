<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDevelopmentComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_development_components', function (Blueprint $table) {
            $table->id();
            $table->string('component_type',50)->nullable();
            $table->unsignedInteger('project_id',false)->nullable();
            $table->string('type1',50)->nullable();
            $table->string('type2',50)->nullable();
            $table->string('type3',50)->nullable();
            $table->integer('units')->nullable();
            $table->integer('storeys')->nullable();
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
        Schema::dropIfExists('project_development_components');
    }
}
