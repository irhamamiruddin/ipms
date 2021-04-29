<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandKetuaKampungPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_ketua_kampung_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('land_id',false);
            $table->unsignedInteger('contact_id',false);
            $table->text('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_ketua_kampung_pivot');
    }
}
