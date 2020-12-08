<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAicEmployeesBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aic_employees_bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users');
            $table->string('bankName');
            $table->string('bankBranch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aic_employees_bank_details');
    }
}
