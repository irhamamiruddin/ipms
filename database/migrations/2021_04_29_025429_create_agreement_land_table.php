<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreement_land', function (Blueprint $table) {
            $table->unsignedInteger('land_id',false);
            $table->unsignedInteger('registered_proprietor_nature_id',false);
            $table->date('signing_date')->nullable();
            $table->date('stamping_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('reminder_period')->nullable();
            $table->date('reminder_date')->nullable();
            $table->boolean('reminder_noty')->nullable();
            $table->decimal('s_p_price',20,2)->nullable();
            $table->string('consideration',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreement_land');
    }
}
