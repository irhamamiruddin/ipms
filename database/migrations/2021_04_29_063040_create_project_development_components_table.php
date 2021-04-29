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
            $table->string('component_type',5)->nullable();
            $table->unsignedInteger('project_id',false)->nullable();
            $table->integer('type1')->nullable();
            $table->integer('type2')->nullable();
            $table->integer('type3')->nullable();
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
