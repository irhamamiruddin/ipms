<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('access_rights', 255)->nullable();
            $table->string('role', 255)->nullable();
            $table->integer('role_id')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('superadmin_permission', 255)->nullable();
            $table->string('bp_permission', 255)->nullable();
            $table->string('cp_permission', 255)->nullable();
            $table->string('land_staff_permission', 255)->nullable();
            $table->string('project_staff_permission', 255)->nullable();
            $table->string('manager_permission', 255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
