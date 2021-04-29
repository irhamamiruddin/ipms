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
            $table->string('name',2000);
            $table->string('nric',2000);
            $table->string('race',2000);
            $table->string('contact_no',2000);
            $table->string('address',2000);
            $table->string('remark',2000);
            $table->string('home_phone',20);
            $table->string('office_phone',20);
            $table->string('fax_phone',20);
            $table->string('email',191);
            $table->text('image');
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
