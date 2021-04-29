<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('business_nature_id',false);
            $table->string('company_name',3000);
            $table->string('company_no',255);
            $table->string('principle_name',3000);
            $table->string('registered_person_no',191);
            $table->string('address',2000);
            $table->string('phone',100);
            $table->string('fax',100);
            $table->string('email',1000);
            $table->string('banker',191);
            $table->string('bank_ac_no',255);
            $table->string('home_phone',20);
            $table->string('office_phone',20);
            $table->string('fax_phone',20);
            $table->string('website_url',255);
            $table->text('remark');
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
        Schema::dropIfExists('companies');
    }
}
