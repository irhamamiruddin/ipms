<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyApprovedPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_approved_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('consultant_id',false);
            $table->string('display_name',2000);
            $table->date('approved_date');
            $table->date('expiry_date');
            $table->date('reminder_date');
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
        Schema::dropIfExists('key_approved_plans');
    }
}
