<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactCompanyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_company_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('contact_id',false)->nullable();
            $table->unsignedInteger('company_id',false)->nullable();
            $table->text('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_company_pivot');
    }
}
