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
            $table->unsignedInteger('business_nature_id',false)->nullable();
            $table->string('company_name',3000)->nullable();
            $table->string('company_no',255)->nullable();
            $table->string('principle_name',3000)->nullable();
            $table->string('registered_person_no',191)->nullable();
            $table->string('address',2000)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('email',1000)->nullable();
            $table->string('banker',191)->nullable();
            $table->string('bank_ac_no',255)->nullable();
            $table->string('home_phone',20)->nullable();
            $table->string('office_phone',20)->nullable();
            $table->string('fax_phone',20)->nullable();
            $table->string('website_url',255)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
