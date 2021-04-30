<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name',2000)->nullable();
            $table->string('nric',2000)->nullable();
            $table->string('race',2000)->nullable();
            $table->string('contact_no',2000)->nullable();
            $table->string('address',2000)->nullable();
            $table->string('remark',2000)->nullable();
            $table->string('home_phone',20)->nullable();
            $table->string('office_phone',20)->nullable();
            $table->string('fax_phone',20)->nullable();
            $table->string('email',191)->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
