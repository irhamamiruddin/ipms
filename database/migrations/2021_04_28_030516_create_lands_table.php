<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id')->nullable();
            $table->string('land_description', 2000)->nullable();
            $table->integer('field_lot')->nullable();
            $table->integer('lot')->nullable();
            $table->integer('block')->nullable();
            $table->string('district', 2000)->nullable();
            $table->decimal('size', 11,2)->nullable();
            $table->string('size_unit', 10)->nullable();
            $table->string('locality', 2000)->nullable();
            $table->integer('classification')->nullable();
            $table->integer('term')->nullable();
            $table->date('commencement_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('expiry_date_noty')->nullable();
            $table->integer('proprietor_nature')->nullable();
            $table->date('proprietor_signing_date')->nullable();
            $table->date('proprietor_stamping_date')->nullable();
            $table->date('proprietor_expiry_date')->nullable();
            $table->integer('proprietor_remind_period')->nullable();
            $table->date('proprietor_remind_date')->nullable();
            $table->decimal('proprietor_sp_price', 11,2)->nullable();
            $table->string('proprietor_consideration', 2000)->nullable();
            $table->integer('trustee_consent')->nullable();
            $table->date('trustee_signing_date')->nullable();
            $table->date('trustee_stamping_date')->nullable();
            $table->string('trustee_instrument_no', 500)->nullable();
            $table->date('trustee_instrument_registered_date')->nullable();
            $table->decimal('price', 11,2)->nullable();
            $table->decimal('gps_land_size', 11,2)->nullable();
            $table->string('gps_land_size_unit', 10)->nullable();
            $table->date('date_of_registration')->nullable();
            $table->string('annual_rent', 191)->nullable();
            $table->unsignedInteger('land_acquisition_status_id')->nullable();
            $table->string('division', 191)->nullable();
            $table->unsignedInteger('categories_of_land_id')->nullable();
            $table->string('special_condition', 191)->nullable();
            $table->date('annual_rent_last_paid_date')->nullable();
            $table->date('annual_rent_next_paid_date')->nullable();
            $table->boolean('annual_rent_next_paid_date_noty')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('lands');
    }
}
