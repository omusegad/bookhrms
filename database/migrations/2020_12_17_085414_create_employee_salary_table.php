<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('employee_salary', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();
            $table->string("education");
            $table->string("grade");
            $table->string("job_group");
            $table->float("current_salary");
            $table->float("basic_salary");
            $table->float("hse_allowance");
            $table->float("transport_allowance");
            $table->float("airtime_allowance");
            $table->float("personalRelief")->nullable();
            $table->float("nhif")->nullable();
            $table->float("incomeTax")->nullable();
            $table->float("payee")->nullable();
            $table->float("payAfterTax")->nullable();
            $table->float("net_salary")->nullable();
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
        Schema::dropIfExists('employee_salary');
    }
}
