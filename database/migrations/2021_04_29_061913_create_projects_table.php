<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title',2000)->nullable();
            $table->string('address',2000)->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('project_status_id')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('backup_assignee')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
