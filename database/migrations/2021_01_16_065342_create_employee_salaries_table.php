<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();
            $table->string("job_group");
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
            $table->enum('status', array('active', 'inactive'))->default('active');
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
        Schema::dropIfExists('employee_salaries');
    }
}
